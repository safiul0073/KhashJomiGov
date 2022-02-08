<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use Illuminate\Http\Request;

class ApplicationApiController extends Controller
{
    public function get_applications (Request $request) {


        return DataTableService::make($request);
    }
}
