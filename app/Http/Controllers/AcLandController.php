<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class AcLandController extends Controller
{
    public function index (Request $request) {
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'home';

        }

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


        return view('admin.contents.acland.index', compact('applications', 'tab'));
    }

    public function sendToTowShil ($id) {

        BondobostoApp::find($id)->update(['accept_id' => 2]);
        return back()->withSuccess('success', 'তৌশিলদার কে সেন্ড করা হয়েছে');
    }

    public function sendToUno ($id) {

        BondobostoApp::find($id)->update(['accept_id' => 3, 'return_id' => null]);
        return back()->withSuccess('success', 'Uno কে সেন্ড করা হয়েছে');
    }
}
