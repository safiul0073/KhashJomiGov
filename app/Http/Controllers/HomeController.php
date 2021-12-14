<?php

namespace App\Http\Controllers;

use App\Models\BondobostoApp;
use App\Models\User;
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
        $users = User::select('id', 'name')->get();
        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.application', compact('application','users'));
                break;
            case 2:
                return view('admin.contents.towshilder.application', compact('application','users'));
                break;
            case 3:
                return view('admin.contents.uno.application', compact('application','users'));
                break;
            case 4:
                return view('admin.contents.dc.application', compact('application','users'));
                break;
            case 5:
                return view('admin.contents.adc.application', compact('application','users'));
                break;
            default:
                return view('admin.contents.adc_revinew.application', compact('application','users'));
                break;
        }
    }

    public function editApplication($id) {


        $application = BondobostoApp::findOrFail($id);
        $users = User::select('id', 'name')->get();

        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.edit', compact('application','users'));
                break;
            case 2:
                return view('admin.contents.towshilder.edit', compact('application','users'));
                break;
            case 3:
                return view('admin.contents.uno.edit', compact('application','users'));
                break;
            case 4:
                return view('admin.contents.dc.edit', compact('application','users'));
                break;
            case 5:
                return view('admin.contents.adc.edit', compact('application','users'));
                break;
            default:
                return view('admin.contents.adc_revinew.edit', compact('application','users'));
                break;
        }
    }
}
