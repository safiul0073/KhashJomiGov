<?php
namespace App\Services;

use App\Models\BondobostoApp;
use App\Models\User;

class QueryService {

    public function queryCount($accept_id, $role_id=null) {

        if ($role_id == null){
            if (is_array($accept_id)) {
               $query = BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->whereIn('accept_id', $accept_id);
               })->where('status', 2);
            }else{
               $query = BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->where('accept_id', $accept_id);
               })->where('status', 2);
            }

          }else{
           if (is_array($accept_id)) {
               $query =BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                   $query->whereIn('accept_id', $accept_id)->where('role_id', $role_id);
               })->where('status', 2);
            }else{
               $query =BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                   $query->where('accept_id', $accept_id)->where('role_id', $role_id);
               })->where('status', 2);
            }
           }
           return $query->count();

    }
    public function queryCountUpazila(User $user,$accept_id, $role_id) {

        if ($role_id == null){
             if (is_array($accept_id)) {
                $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->whereIn('accept_id', $accept_id);
                })->where('status', 2);
             }else{
                $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->where('accept_id', $accept_id);
                })->where('status', 2);
             }

           }else{
            if (is_array($accept_id)) {
                $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                    $query->whereIn('accept_id', $accept_id)->where('role_id', $role_id);
                })->where('status', 2);
             }else{
                 if (is_array($role_id)) {
                    $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                        $query->where('accept_id', $accept_id)->whereIn('role_id', $role_id);
                    })->where('status', 2);
                 }else {
                    $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                        $query->where('accept_id', $accept_id)->where('role_id', $role_id);
                    })->where('status', 2);
                 }

             }
            }
            return $query->count();
    }
    public function queryCountUnion(User $user,$accept_id, $role_id=null) {

        if ($role_id == null){
             if (is_array($accept_id)) {
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->whereIn('accept_id', $accept_id);
                })->where('status', 2);
             }else{
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->where('accept_id', $accept_id);
                })->where('status', 2);
             }

           }else{
            if (is_array($accept_id)) {
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->whereIn('accept_id', $accept_id);
                })->where('status', 2);
             }else{
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->where('accept_id', $accept_id);
                })->where('status', 2);
             }
            }
            return $query->count();
    }
    public function queryData($accept_id, $role_id=null) {

        if ($role_id == null){
            if (is_array($accept_id)) {
               $query = BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->whereIn('accept_id', $accept_id);
               })->where('status', 2);
            }else{
               $query = BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->where('accept_id', $accept_id);
               })->where('status', 2);
            }

          }else{
            if (is_array($accept_id)) {
                $query =BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                    $query->whereIn('accept_id', $accept_id)->where('role_id', $role_id);
                })->where('status', 2);
             }else{
                $query =BondobostoApp::whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                    $query->where('accept_id', $accept_id)->where('role_id', $role_id);
                })->where('status', 2);
             }
           }
           return $query->get();

    }
    public function queryDataUpazila(User $user,$accept_id, $role_id) {

        if ($role_id == null){
            if (is_array($accept_id)) {
               $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->whereIn('accept_id', $accept_id);
               })->where('status', 2);
            }else{
               $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                   $query->where('accept_id', $accept_id);
               })->where('status', 2);
            }

          }else{
           if (is_array($accept_id)) {
               $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                   $query->whereIn('accept_id', $accept_id)->where('role_id', $role_id);
               })->where('status', 2);
            }else{
                if (is_array($role_id)) {
                   $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                       $query->where('accept_id', $accept_id)->whereIn('role_id', $role_id);
                   })->where('status', 2);
                }else {
                   $query = $user->upazila->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id, $role_id) {
                       $query->where('accept_id', $accept_id)->where('role_id', $role_id);
                   })->where('status', 2);
                }

            }
           }
            return $query->get();
    }
    public function queryDataUnion(User $user,$accept_id, $role_id=null) {

        if ($role_id == null){
             if (is_array($accept_id)) {
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->whereIn('accept_id', $accept_id);
                })->where('status', 2);
             }else{
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->where('accept_id', $accept_id);
                })->where('status', 2);
             }

           }else{
            if (is_array($accept_id)) {
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->whereIn('accept_id', $accept_id);
                })->where('status', 2);
             }else{
                $query = $user->union->bondobosto_apps()->whereHas('app_sends', function ($query) use ($accept_id) {
                    $query->where('accept_id', $accept_id);
                })->where('status', 2);
             }
            }
            return $query->get();
    }

}
