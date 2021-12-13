<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $totalApp = BondobostoApp::all()->count();
        return view('admin.contents.dashboard.index', compact('totalApp'));
    }

    public function showApplication($id) {
        $application = BondobostoApp::findOrFail($id);

        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.application', compact('application'));
                break;
            case 2:
                return view('admin.contents.towshilder.application', compact('application'));
                break;
            case 3:
                return view('admin.contents.uno.application', compact('application'));
                break;
            case 4:
                return view('admin.contents.dc.application', compact('application'));
                break;
            case 5:
                return view('admin.contents.adc.application', compact('application'));
                break;

            default:
                return view('admin.contents.adc_revinew.application', compact('application'));
                break;
        }
    }
}
