<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class TowshilderController extends Controller
{
    public function index (Request $request) {
        $tab = $request->tab;
        if ($tab == null) {
            $tab = 'get1';

        }

        if($tab == 'get1') {
            $applications = BondobostoApp::with(['union','upa_zila'])
                                           ->where("accept_id", auth()->user()->role_id)
                                           ->where('return_id', null)
                                           ->latest()
                                           ->get();
        }else if($tab == 'put1') {
            $applications = BondobostoApp::with(['union','upa_zila'])
                                            ->where("accept_id", auth()->user()->role_id)
                                            ->where('return_id', 1)
                                           ->latest()
                                           ->get();
        }
        // dd($applications);
        return view('admin.contents.towshilder.index', compact('applications', 'tab'));
    }

    public function sendToToAcLand ($id) {

        BondobostoApp::find($id)->update(['return_id' => 1]);
        return back()->withSuccess('success', 'তৌশিলদার কে সেন্ড করা হয়েছে');
    }
}
