<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class AdcRevinewController extends Controller
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
            // $applications = BondobostoApp::with(['union','upa_zila'])
            //                                 ->where("accept_id", auth()->user()->role_id)
            //                                 ->where('return_id', 1)
            //                                ->latest()
            //                                ->get();
        }
        return view('admin.contents.adc_revinew.index', compact('applications', 'tab'));
    }

    // public function sendToToAdc ($id) {

    //     BondobostoApp::find($id)->update(['accept_id' => 5, 'return_id' => null]);
    //     return back()->withSuccess('ADC Office সেন্ড করা হয়েছে');
    // }
}
