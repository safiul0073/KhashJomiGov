<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppSend;
use Illuminate\Http\Request;

class AppSendController extends Controller
{
    public function appSends ($id) {
        $app_send = AppSend::with('user')->findOrFail($id);
        return view('admin.contents.app-send-view.index', compact('app_send'));
    }
}
