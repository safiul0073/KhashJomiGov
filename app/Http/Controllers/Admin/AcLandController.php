<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Models\User;
use App\Services\FileService;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AcLandController extends Controller
{

    public function index (Request $request, QueryService $service) {

        $user= [];
        $user = auth()->user();
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'home';
        }

        $applications_count = BondobostoApp::where('status', 0)->where('upa_zila_id', $user->upa_zila_id)->count();
        $nothiCount = BondobostoApp::where('status', 1)->where('upa_zila_id', $user->upa_zila_id)->count();
        $applications_grohon1 = $service->queryCountUpazila($user, $user->role_id,2);
        $applications_preron2 = $service->queryCountUpazila($user, [3,4,5,6],$user->role_id);
        $from_dc_grohon_count = $service->queryCountUpazila($user, $user->role_id,User::DC);
        $applications_preron1 = $service->queryCountUpazila($user, 2, $user->role_id);
        $applications_grohon2 = $service->queryCountUpazila($user ,$user->role_id, [3,5,6]);
        if ($tab == 'home') {
            $applications = $user->upazila->bondobosto_apps()->where('status', 0)->get();


        }else if($tab == 'get1') {
            $applications = $service->queryDataUpazila($user, $user->role_id,2);

        }else if ($tab == 'get2') {
            $applications = $service->queryDataUpazila($user, $user->role_id,[3,5,6]);


        }else if ($tab == 'dc_get') {
            $applications = $service->queryDataUpazila($user, $user->role_id,User::DC);


        }else if($tab == 'put1') {
            $applications = $service->queryDataUpazila($user, 2, $user->role_id);


        }else if($tab == 'put2') {
            $applications =  $service->queryDataUpazila($user, [3,4,5,6], $user->role_id);

        }else if($tab == 'nothi') {
            $applications =  $user->upazila->bondobosto_apps()->with(['union','upa_zila'])->where('status', 1)->latest()->get();

        }

        // if (request()->ajax()) {
        //     return datatables()
        //     ->of($applications)
        //     ->addColumn('action', function ($data) {
        //         $button = '<a href="'.route('admin.ac.land.show', $data->id).'" class="btn btn-primary btn-sm">View</a>';
        //         return $button;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
        // }


        return view('admin.contents.acland.index', compact('applications',
                                                           'tab',
                                                           'from_dc_grohon_count',
                                                           'applications_count',
                                                           'applications_grohon1',
                                                           'applications_grohon2',
                                                           'applications_preron1',
                                                           'applications_preron2',
                                                           'nothiCount'
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

        try {
            DB::beginTransaction();
            $application = BondobostoApp::findOrFail($id);
            if(!$application) return redirect()->back()->with('error', 'something went wrong');
            if($request->receive){
                $app_send = $application->app_sends()->updateOrCreate(
                    ['accept_id'=>$request->receive,
                    'user_id' => auth()->id(),
                    'role_id' => auth()->user()->role_id],
                    ['openion' => $request->openion, 'montobbo' => $request->montobbo]);
                }

                if($request->hasFile('file')){

                     if ($app_send && File::exists($app_send->file)) {
                            File::delete($app_send->file);
                        }
                     $app_send->file = $service->fileExequtes($request->file('file'));
                     $app_send->save();
                    }
                $application->update(['status' => 2]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
        DB::commit();
        return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে & সেন্ড করা হয়েছে');

    }


    public function sendToNothi ($id) {

            $app = BondobostoApp::findOrFail($id);
            if (!$app) return redirect()->back()->with('error', 'something went wrong');
            $a = $app->update(['status' => 1]);
            if (!$a) return redirect()->back()->with('error', 'something went wrong');
            return redirect()->back()->withSuccess('Send successfully');

    }

}
