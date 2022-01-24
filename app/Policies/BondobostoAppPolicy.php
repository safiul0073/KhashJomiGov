<?php

namespace App\Policies;

use App\Models\BondobostoApp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BondobostoAppPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user )
    {
        if ($user->role_id == User::DC) {
            return true;
        }
        if ($user->role_id == User::ADC) {
            return true;
        }
        if ($user->role_id == User::RDC) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BondobostoApp  $bondobostoApp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BondobostoApp $bondobostoApp)
    {

        if ($user->role_id == User::DC) {
            return true;
        }
        if ($user->role_id == User::ADC) {
            return true;
        }
        if ($user->role_id == User::RDC) {
            return true;
        }
        if ($user->role_id == User::AC_LAND) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {
                return true;
            }
        }

        if ($user->role_id == User::TOWSHILDER) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {

                if ($user->union_id == $bondobostoApp->union_id) {
                    return true;
                }

            }
        }
    }



    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BondobostoApp  $bondobostoApp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BondobostoApp $bondobostoApp)
    {
        if ($user->role_id == User::DC) {
            return true;
        }
        if ($user->role_id == User::ADC) {
            return true;
        }
        if ($user->role_id == User::RDC) {
            return true;
        }
        if ($user->role_id == User::AC_LAND) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {
                return true;
            }
        }

        if ($user->role_id == User::TOWSHILDER) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {

                if ($user->union_id == $bondobostoApp->union_id) {
                    return true;
                }

            }
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BondobostoApp  $bondobostoApp
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BondobostoApp $bondobostoApp)
    {
        if ($user->role_id == User::$DC) {
            return true;
        }
        if ($user->role_id == User::$ADC) {
            return true;
        }
        if ($user->role_id == User::$RDC) {
            return true;
        }
        if ($user->role_id == User::$AC_LAND) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {
                return true;
            }
        }

        if ($user->role_id == User::$TOWSHILDER) {
            if ($user->upa_zila_id == $bondobostoApp->upa_zila_id) {

                if ($user->union_id == $bondobostoApp->union_id) {
                    return true;
                }

            }
        }
    }


}
