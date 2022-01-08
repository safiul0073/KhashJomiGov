<?php
namespace App\Services;

use App\Models\BondobostoApp;

class QueryService {

    public function queryCount($accept, $send=null, $upa_zila_id=null, $union_id = null) {
        if ($upa_zila_id == null && $union_id == null && $send == null) {

            return $this->Accept($accept, $send)->count();

        }else if ($upa_zila_id == null && $union_id == null) {

            return $this->AcceptSend($accept, $send)->count();

        }else if ($send == null) {

            return $this->AcptUpUn($accept, $upa_zila_id, $union_id)->count();

        }else if (is_array($accept)) {

            return $this->AcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->count();

        }else{
            return $this->AcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->count();
        }
    }

    // geting application data
    public function queryData($accept, $send=null, $upa_zila_id=null, $union_id = null) {

        if ($upa_zila_id == null && $union_id == null && $send == null) {

            return $this->Accept($accept, $send)->get();

        }else if ($upa_zila_id == null && $union_id == null) {

            return $this->AcceptSend($accept, $send)->get();

        }else if ($send == null) {
            return $this->AcptUpUn($accept, $upa_zila_id, $union_id)->get();
        } else if (is_array($accept)) {
            return $this->AcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->get();
        }else {
            return $this->AcptSndUpUn($accept, $send, $upa_zila_id, $union_id)->get();
        }

    }

    public function AcptUpUn($accept,$upa_zila_id, $union_id) {
        if($union_id == null){
            $result = $this->Accept($accept)->where('upa_zila_id', $upa_zila_id);
            return $result;
        }else {
            $result = $this->Accept($accept)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id);
            return $result;
        }
    }

    public function AcptSndUpUn($accept, $send, $upa_zila_id, $union_id) {
        $result= [];
        if (is_array($accept)) {
            if($union_id == null){
                $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                    $query->whereIn('accept_id', $accept)->where('send_id', $send);
                })->where('status', 2)->where('upa_zila_id', $upa_zila_id);
                return $result;
            }else {
                $result = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
                    $query->whereIn('accept_id', $accept)->where('send_id', $send);
                })->where('status', 2)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id);
                return $result;
            }
        }
        if($union_id == null){
            $result = $this->AcceptSend($accept, $send)->where('upa_zila_id', $upa_zila_id);
            return $result;
        }else {
            $result = $this->AcceptSend($accept, $send)->where('upa_zila_id', $upa_zila_id)->where('union_id', $union_id);
            return $result;
        }
    }

    public function AcceptSend ($accept, $send) {
        
        $query = BondobostoApp::whereHas('app_roles', function ($query) use ($accept, $send) {
            $query->where('accept_id', $accept)->where('send_id', $send);
        })->where('status', 2);
        return $query->get();
    }

    public function Accept ($accept) {
        $query = BondobostoApp::whereHas('app_roles', function ($query) use ($accept) {
            $query->where('accept_id', $accept);
        })->where('status', 2);
        return $query;
    }
}
