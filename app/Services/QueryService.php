<?php
namespace App\Services;

use App\Models\BondobostoApp;

class QueryService {

    public function queryCount($accept, $send) {
        $result =0;

        if ($send == null) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
                        })->where('status', 2)->count();
            return $result;
        }else if (is_array($accept)) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->whereIn('accept_id', $accept)->where('send_id', $send);
            })->where('status', 2)->count();
            return $result;
        }else{
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
            })->where('status', 2)->count();
            return $result;
        }
    }
    public function queryData($accept, $send) {
        $result = [];
        if ($send == null) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
            })->where('status', 2)->get();
        } else if (is_array($accept)) {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->whereIn('accept_id', $accept)->where('send_id', $send);
            })->where('status', 2)->get();
        }else {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
            })->where('status', 2)->get();
        }
        return $result;
    }
}
