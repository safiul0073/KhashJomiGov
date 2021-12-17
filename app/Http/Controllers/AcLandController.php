<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Services\FileService;
use Illuminate\Http\Request;

class AcLandController extends Controller
{
    public function index (Request $request) {
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'home';

        }
        $applications_count = BondobostoApp::where('accept_id', null)->count();
        $applications_grohon2 = BondobostoApp::where('return_id', 3)->count();
        $applications_preron2 = BondobostoApp::where('accept_id', 3)->count();
        $applications_preron1 = BondobostoApp::where('accept_id', 2)->count();
        $applications_grohon1 = BondobostoApp::where('return_id', auth()->user()->role_id)->where('accept_id', 2)->count();
        if ($tab == 'home') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('accept_id', null)->latest()->get();

        }else if($tab == 'get1') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('return_id', auth()->user()->role_id)->where('accept_id', 2)->latest()->get();

        }else if ($tab == 'get2') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('return_id', 3)->latest()->get();

        }else if($tab == 'put1') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('accept_id', 2)->latest()->get();

        }else if($tab == 'put2') {
            $applications = BondobostoApp::with(['union','upa_zila'])->where('accept_id', 3)->latest()->get();

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
            'receive' => 'nullable|numeric|exists:roles,id',
            'openion' => 'nullable|string',
            'content' => 'nullable|string',
            'file' => 'nullable| mimes:jpeg,bmp,png,jpg,pdf,docx,doc,xlsx,xls,ppt,pptx,txt:max:10000',
        ]);
        $service = new FileService();

        $application = BondobostoApp::findOrFail($id);

        if(!$application) return redirect()->back()->with('error', 'something went wrong');

        if($request->receive){
            $application->accept_id =  $request->receive;
            $application->save();
            if (!$application) return redirect()->back()->with('error', 'something went wrong');
        }

        if($request->openion){
            if($request->hasFile('file')){
                $app_send = AppSend::where('bondobosto_app_id',$application->id)->where('user_id', auth()->id())->first();
                // check if file is already uploaded
                 if ($app_send && file_exists(public_path($app_send->file))) {
                    unlink(public_path($app_send->file));
                 }
            }
            $application->app_sends()->updateOrCreate(
                ['user_id' => auth()->user()->id],[
                 'openion' => $request->openion,
                 'content' => $request->content,
                 'file' => $request->hasFile('file')?$service->fileExequtes($request->file('file')): null,
            ]);
            return redirect()->back()->withSuccess('আপনার মতামত সফলভাবে পাঠিয়েছে');
        }

        return redirect()->back()->withSuccess('সেন্ড করা হয়েছে');
    }

}
