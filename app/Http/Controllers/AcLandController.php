<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Services\FileService;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AcLandController extends Controller
{
    public function index (Request $request, QueryService $service) {
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'home';

        }
        $applications_count = BondobostoApp::where('status', 0)->count();
        $applications_grohon1 = $service->queryCount(auth()->user()->role_id, 2);

        $applications_preron2 = $service->queryCount(3,auth()->user()->role_id);
        $applications_preron1 = $service->queryCount(2,auth()->user()->role_id);
        $applications_grohon2 = $service->queryCount(auth()->user()->role_id, 3);
        if ($tab == 'home') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('status', 0)->latest()->get();

        }else if($tab == 'get1') {
            $applications = $service->queryData(auth()->user()->role_id, 2);

        }else if ($tab == 'get2') {
            $applications = $service->queryData(auth()->user()->role_id, 3);

        }else if($tab == 'put1') {
            $applications = $service->queryData(2,auth()->user()->role_id);

        }else if($tab == 'put2') {
            $applications = $service->queryData(6,auth()->user()->role_id);

        }


        return view('admin.contents.acland.index', compact('applications',
                                                           'tab',
                                                           'applications_count',
                                                           'applications_grohon1',
                                                           'applications_grohon2',
                                                           'applications_preron1',
                                                           'applications_preron2',
                                                        ));
    }

    public function sendToAny (Request $request, $id) {

        $this->validate($request, [
            'receive' => 'required|numeric|exists:roles,id',
            'openion' => 'nullable|string',
            'montobbo' => 'nullable|string',
            'file' => 'nullable| mimes:jpeg,bmp,png,jpg,pdf,docx,doc,xlsx,xls,ppt,pptx,txt:max:10000',
        ]);
        $service = new FileService();
        $params = array();
        $application = BondobostoApp::findOrFail($id);

        if(!$application) return redirect()->back()->with('error', 'something went wrong');

        if($request->receive){
            $h = $application->app_roles()->updateOrCreate(['accept_id'=>$request->receive, 'send_id' => auth()->user()->role_id], ['status'=> 0]);
            if (!$h) {
                $application->app_roles()->create([
                    'accept_id' => $request->receive,
                    'send_id' => auth()->user()->role_id,
                    'status' => 0,
                ]);
            }
        }


            if($request->hasFile('file')){
                $app_send = AppSend::where('bondobosto_app_id',$application->id)->where('user_id', auth()->id())->where('role_id', $request->receive)->first();
                // check if file is already uploaded
                 if ($app_send && File::exists($app_send->file)) {
                        File::delete($app_send->file);
                 }
                }
                if ($request->openion) {
                    $params['openion'] = $request->openion;
                }
                if ($request->montobbo) {
                    $params['montobbo'] = $request->montobbo;
                }
                if ($request->hasFile('file')) {
                    $params['file'] = $service->fileExequtes($request->file('file'));
                }
                $params2 = array();
                $params2['user_id'] = auth()->id();
                $params2['role_id'] = $request->receive;
                $application->app_sends()->updateOrCreate($params2, $params);
            return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে & সেন্ড করা হয়েছে');

    }

}
