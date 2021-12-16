<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Models\Role;
use App\Models\Union;
use App\Models\UpaZila;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $totalApp = BondobostoApp::all()->count();
        return view('admin.contents.dashboard.index', compact('totalApp'));
    }

    public function showApplication($id) {
        $application = BondobostoApp::with('app_sends')->findOrFail($id);
        $roles = Role::get();
        $app_sends = AppSend::with('user')->where('bondobosto_app_id', $id)->get();
        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.application', compact('application','roles','app_sends'));
                break;
            case 2:
                return view('admin.contents.towshilder.application', compact('application','roles','app_sends'));
                break;
            case 3:
                return view('admin.contents.uno.application', compact('application','roles','app_sends'));
                break;
            case 4:
                return view('admin.contents.dc.application', compact('application','roles','app_sends'));
                break;
            case 5:
                return view('admin.contents.adc.application', compact('application','roles','app_sends'));
                break;
            default:
                return view('admin.contents.adc_revinew.application', compact('application','roles','app_sends'));
                break;
        }
    }

    public function editApplication($id) {

        $upa_zilas = UpaZila::with('unions')->get();
        $unions = Union::all();
        $application = BondobostoApp::findOrFail($id);
        $users = User::select('id', 'name')->get();

        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
            case 2:
                return view('admin.contents.towshilder.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
            case 3:
                return view('admin.contents.uno.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
            case 4:
                return view('admin.contents.dc.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
            case 5:
                return view('admin.contents.adc.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
            default:
                return view('admin.contents.adc_revinew.edit', compact('application','users','upa_zilas','unions','roles'));
                break;
        }
    }
}
