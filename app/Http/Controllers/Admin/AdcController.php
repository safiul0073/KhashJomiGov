<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Services\FileService;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        try {
            DB::beginTransaction();
            $application = BondobostoApp::findOrFail($id);
            if(!$application) return redirect()->back()->with('error', 'something went wrong');
            if($request->receive){
                $app_send = $application->app_sends()->updateOrCreate(
                    ['accept_id'=>$request->receive,
                     'role_id' => auth()->user()->role_id],
                    ['adesh' => $request->adesh,
                     'onucched' => $request->onucched,
                     'user_id' => auth()->id()]);
                }
                if($request->hasFile('file')){

                     if ($app_send && File::exists($app_send->file)) {
                            File::delete($app_send->file);
                        }
                     $app_send->file = $service->fileExequtes($request->file('file'));
                     $app_send->save();
                    }

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
        DB::commit();
        return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে & সেন্ড করা হয়েছে');
        }



}
