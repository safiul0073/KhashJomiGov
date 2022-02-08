<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Models\User;
use App\Services\DataTableService;
use App\Services\FileService;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DcController extends Controller
{
    public function index (Request $request,QueryService $service) {
        $user = [];
        $applications = [];
        $user = auth()->user();
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'apps';

        }
        $applications_count = BondobostoApp::count();
        $grohonData1 = $service->queryCount($user->role_id, [User::UNO,User::AC_LAND]);
        $grohonData2 = $service->queryCount($user->role_id, User::ADC);
        $preronData1 =$service->queryCount(User::RDC,$user->role_id);
        $preronData2 =$service->queryCount(User::AC_LAND,$user->role_id);
        $nothiCount = BondobostoApp::where('status', 1)->count();
        if($tab == 'get1') {
            $applications = $service->queryData($user->role_id, [User::UNO,User::AC_LAND]);

        }else if($tab == 'get2') {
            $applications = $service->queryData($user->role_id,User::ADC);

        }else if($tab == 'put1') {
            $applications = $service->queryData(User::RDC, $user->role_id);

        }else if($tab == 'put2') {
            $applications = $service->queryData(User::AC_LAND, $user->role_id);

        }else if($tab == 'nothi') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('status', 1)->latest()->get();

        }else if ($tab == 'apps') {
            $applications = BondobostoApp::with(['union','upa_zila'])->latest()->get();

        }


        return view('admin.contents.dc.index', compact('applications', 'tab','applications_count', 'grohonData1','grohonData2', 'preronData1','preronData2','nothiCount'));
    }

    public function sendToAny (Request $request, $id) {
        $user = [];
        $user = auth()->user();
        $this->validate($request, [
            'receive' => 'required|numeric|exists:roles,id',
            'onucched' => 'nullable|string',
            'adesh' => 'nullable|string',
            'file' => 'nullable| mimes:jpeg,bmp,png,jpg,pdf,docx,doc,xlsx,xls,ppt,pptx,txt:max:10000',
        ]);
        $service = new FileService();
        $params = array();
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
            // if ($request->receive == 1) {
            //     $application->status = 1;
            //     $application->save();
            // }
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
            $application->app_sends()->updateOrCreate(['user_id' => $user->id, 'role_id' => $request->receive],$params);
            return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে & সেন্ড করা হয়েছে');
    }

}
