<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use App\Models\BondobostoApp;
use App\Models\PreviusUser;
use App\Models\Role;
use App\Models\Union;
use App\Models\UpaZila;
use App\Models\User;
use App\Services\QueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(QueryService $service)
    {
        if (auth()->user()->role_id == 1) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $applications_grohon1 = $service->queryCount(auth()->user()->role_id, 2);
            $applications_preron2 = $service->queryCount(3,auth()->user()->role_id);
            $applications_preron1 = $service->queryCount(2,auth()->user()->role_id);
            $applications_grohon2 = $service->queryCount(auth()->user()->role_id, 3);
            return view('admin.contents.dashboard.index', compact('totalApp','applications_grohon1','applications_preron2','applications_preron1','applications_grohon2'));
        }
        if (auth()->user()->role_id == 2) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonApps = $service->queryCount(auth()->user()->role_id, null);
            $preronApp =$service->queryCount(1,auth()->user()->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonApps','preronApp'));
        }
        if (auth()->user()->role_id == 3) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount(auth()->user()->role_id, null);
            $preronData =$service->queryCount(4,auth()->user()->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if (auth()->user()->role_id == 4) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount(auth()->user()->role_id, null);
            $preronData =$service->queryCount([5,1],auth()->user()->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if (auth()->user()->role_id == 5) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount(auth()->user()->role_id, null);
            $preronData =$service->queryCount(6,auth()->user()->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if (auth()->user()->role_id == 6) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount(auth()->user()->role_id, null);
            $preronData =$service->queryCount(4,auth()->user()->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }

    }

    public function showApplication($id) {
        $application = BondobostoApp::with('app_sends')->findOrFail($id);
        $roles = Role::all();
        $app_sends = AppSend::with('user')->where('bondobosto_app_id', $id)->get();
        $previous_users = PreviusUser::all();
        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.application', compact('application','roles','app_sends','previous_users'));
                break;
            case 2:
                return view('admin.contents.towshilder.application', compact('application','roles','app_sends','previous_users'));
                break;
            case 3:
                return view('admin.contents.uno.application', compact('application','roles','app_sends','previous_users'));
                break;
            case 4:
                return view('admin.contents.dc.application', compact('application','roles','app_sends','previous_users'));
                break;
            case 5:
                return view('admin.contents.adc.application', compact('application','roles','app_sends','previous_users'));
                break;
            default:
                return view('admin.contents.adc_revinew.application', compact('application','roles','app_sends','previous_users'));
                break;
        }
    }

    public function editApplication($id) {

        $upa_zilas = UpaZila::with('unions')->get();
        $unions = Union::all();
        $application = BondobostoApp::findOrFail($id);
        $roles = Role::all();

        switch (auth()->user()->role_id) {
            case 1:
                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
            case 2:

                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
            case 3:
                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
            case 4:
                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
            case 5:
                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
            default:
                return view('admin.contents.acland.edit', compact('application','upa_zilas','unions','roles'));
                break;
        }
    }

    public function docShow (Request $request) {
        $file = $request->doc;
        return view('admin.contents.acland.doc', compact('file'));
    }
}
