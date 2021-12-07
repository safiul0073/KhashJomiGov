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
}
