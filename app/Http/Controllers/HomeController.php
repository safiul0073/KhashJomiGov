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
        $user = [];
        $user = auth()->user();
        if ( $user->role_id == 1) {
            $totalApp = BondobostoApp::where('status', 0)->where('upa_zila_id', $user->upa_zila_id)->count();
            $applications_grohon1 = $service->queryCount( $user->role_id, 2, $user->upazila_id);
            $applications_preron2 = $service->queryCount(3, $user->role_id, $user->upazila_id);
            $applications_preron1 = $service->queryCount(2, $user->role_id, $user->upazila_id);
            $applications_grohon2 = $service->queryCount( $user->role_id, 3, $user->upazila_id);
            return view('admin.contents.dashboard.index', compact('totalApp','applications_grohon1','applications_preron2','applications_preron1','applications_grohon2'));
        }
        if ( $user->role_id == 2) {
            $totalApp = BondobostoApp::where('status', 0)->where('upa_zila_id', $user->upa_zila_id)->where('union_id', $user->union_id)->count();
            $grohonApps = $service->queryCount( $user->role_id, null, $user->upazila_id, $user->union_id);
            $preronApp =$service->queryCount(1, $user->role_id, $user->upazila_id, $user->union_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonApps','preronApp'));
        }
        if ( $user->role_id == 3) {
            $totalApp = BondobostoApp::where('status', 0)->where('upa_zila_id', $user->upa_zila_id)->count();
            $grohonData = $service->queryCount( $user->role_id, null, $user->upazila_id);
            $preronData =$service->queryCount(4, $user->role_id, $user->upazila_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if ( $user->role_id == 4) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount( $user->role_id);
            $preronData =$service->queryCount([5,1], $user->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if ( $user->role_id == 5) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount( $user->role_id);
            $preronData =$service->queryCount(6, $user->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }
        if ( $user->role_id == 6) {
            $totalApp = BondobostoApp::where('status', 0)->count();
            $grohonData = $service->queryCount($user->role_id);
            $preronData =$service->queryCount(4, $user->role_id);
            return view('admin.contents.dashboard.index', compact('totalApp','grohonData','preronData'));
        }

    }

    public function showApplication($id) {
        $application = BondobostoApp::with('app_sends')->findOrFail($id);
        $roles = Role::all();
        $app_sends = AppSend::with('user')->where('bondobosto_app_id', $id)->get();
        $previous_users = $application->upa_zila->users->where('status', 0);
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
