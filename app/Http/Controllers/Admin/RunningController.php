<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BondobostoApp;
use Illuminate\Http\Request;

class RunningController extends Controller
{
    public function index($id)
    {
        $app = BondobostoApp::find($id);
        if (!$app instanceof BondobostoApp) {
             return redirect()->back()->with('error', 'আপনার অনুরোধ সম্পর্কিত আবেদন খুজে পাওয়া যায়নি');
        }
        $running = $app->app_sends;
        return view('admin.contents.dc.running', compact('running', 'app'));
    }
}
