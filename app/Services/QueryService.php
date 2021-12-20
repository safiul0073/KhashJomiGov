<?php
namespace App\Services;

use App\Models\BondobostoApp;

class QueryService {

    public function queryCount($accept, $send) {
        $result =0;

        if ($send == null) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
                        })->where('status', 1)->count();
            return $result;
        }else{
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
            })->where('status', 1)->count();
            return $result;
        }
    }
    public function queryData($accept, $send) {
        $result = [];
        if ($send == null) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
            })->where('status', 1)->get();
        } else {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
            })->where('status', 1)->get();
        }
        return $result;
    }
}
