<?php

namespace App\Http\Controllers;

use App\Models\AppSend;
use Illuminate\Http\Request;

class AppSendController extends Controller
{
    public function appSends ($id) {
        $app_send = AppSend::with('user')->findOrFail($id);
        return view('admin.contents.app-send-view.index', compact('app_send'));
    }
}
