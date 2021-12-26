<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Services\FileService;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdcController extends Controller
{
    public function index (Request $request,QueryService $service) {
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'get1';

        }
        $grohonData = $service->queryCount(auth()->user()->role_id, null);
        $preronData =$service->queryCount(6,auth()->user()->role_id);
        $nothiCount = BondobostoApp::where('status', 1)->count();
        if($tab == 'get1') {
            $applications = $service->queryData(auth()->user()->role_id, null);
        }else if($tab == 'put1') {
            $applications = $service->queryData(6, auth()->user()->role_id);
        }else if($tab == 'nothi') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('status', 1)->latest()->get();

        }
        return view('admin.contents.adc.index', compact('applications', 'tab', 'grohonData', 'preronData','nothiCount'));
    }

    public function sendToAny (Request $request, $id) {

        $this->validate($request, [
            'receive' => 'required|numeric|exists:roles,id',
            'onucched' => 'nullable|string',
            'adesh' => 'nullable|string',
            'file' => 'nullable| mimes:jpeg,bmp,png,jpg,pdf,docx,doc,xlsx,xls,ppt,pptx,txt:max:10000',
        ]);
        $service = new FileService();
        $params = array();
        $application = BondobostoApp::findOrFail($id);

        if(!$application) return redirect()->back()->with('error', 'something went wrong');

        if($request->receive){
            $h = $application->app_roles()->where('accept_id',auth()->user()->role_id)->where('send_id',4)->update(['accept_id'=>$request->receive, 'send_id'=>auth()->user()->role_id]);
            if (!$h) return redirect()->back()->with('error', 'Already sended');
        }

        if($request->hasFile('file')){
            $app_send = AppSend::where('bondobosto_app_id',$application->id)->where('user_id', auth()->id())->first();
            // check if file is already uploaded
            if ($app_send && File::exists($app_send->file)) {
                File::delete($app_send->file);
            }
        }

            if ($request->onucched) {
                $params['onucched'] = $request->onucched;
            }
            if ($request->adesh) {
                $params['adesh'] = $request->adesh;
            }
            if ($request->hasFile('file')) {
                $params['file'] = $service->fileExequtes($request->file('file'));
            }
            $params['role_id'] = $request->receive;
            $application->app_sends()->updateOrCreate(['user_id' => auth()->user()->id],$params);
            return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে & সেন্ড করা হয়েছে');
        }



}
