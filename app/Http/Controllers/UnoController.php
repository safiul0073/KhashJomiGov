<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class UnoController extends Controller
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
                                            ->where("accept_id", 4)
                                            ->where('return_id', null)
                                           ->latest()
                                           ->get();
        }
        return view('admin.contents.uno.index', compact('applications', 'tab'));
    }

    public function sendToToAcLand ($id) {

        BondobostoApp::find($id)->update(['accept_id' => 4, 'return_id' => null]);
        return back()->withSuccess('DC Office সেন্ড করা হয়েছে');
    }
}
