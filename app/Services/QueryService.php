<?php
namespace App\Services;

use App\Models\BondobostoApp;

class QueryService {



    public function queryCount($accept, $send=null, $upa_zila_id, $union_id = null) {

        if ($send == null) {
            return $this->countAcptUpUn($accept, $upa_zila_id, $union_id)->count();

        }else if (is_array($accept)) {

            return $this->countAcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->count();

        }else{
            return $this->countAcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->count();
        }
    }

    // geting application data
    public function queryData($accept, $send=null, $upa_zila_id, $union_id = null) {

        if ($send == null) {
            return $this->countAcptUpUn($accept, $upa_zila_id, $union_id);
        } else if (is_array($accept)) {
            return $this->countAcptSndUpUn($accept, $send, $upa_zila_id, $union_id);
        }else {
            return $this->countAcptSndUpUn($accept, $send, $upa_zila_id, $union_id);
        }

    }


    public function countAcptUpUn($accept,$upa_zila_id, $union_id= null) {
        if($union_id == null){
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
                        })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->get();
            return $result;
        }else {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
                $query->where('accept_id', $accept);
                        })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id)->get();
            return $result;
        }
    }

    public function countAcptSndUpUn($accept, $send, $upa_zila_id, $union_id= null) {
        $result= [];
        if (is_array($accept)) {
            if($union_id == null){
                $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                    $query->whereIn('accept_id', $accept)->where('send_id', $send);
                })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->get();
                return $result;
            }else {
                $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                    $query->whereIn('accept_id', $accept)->where('send_id', $send);
                })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id)->get();
                return $result;
            }
        }
        if($union_id == null){
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
                        })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->get();
            return $result;
        }else {
            $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                $query->where('accept_id', $accept)->where('send_id', $send);
                        })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id)->get();
            return $result;
        }
    }
}
