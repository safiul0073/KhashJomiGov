<?php

namespace App\Policies;

use App\Models\KhashJomi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KhashJomiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->role_id == User::AC_LAND) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KhashJomi $khashJomi)
    {

        return $user->role_id == User::AC_LAND && $user->upa_zila_id == $khashJomi->upa_zila_id;

    }




    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, KhashJomi $khashJomi)
    {


        return $user->role_id == User::AC_LAND && $user->upa_zila_id == $khashJomi->upa_zila_id;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, KhashJomi $khashJomi)
    {

        return $user->role_id == User::AC_LAND && $user->upa_zila_id == $khashJomi->upa_zila_id;
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, KhashJomi $khashJomi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KhashJomi  $khashJomi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, KhashJomi $khashJomi)
    {
        //
    }
}
