<?php

namespace App\Policies;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferralPolicy
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
        if($user->hasPermissionTo('View Referrals')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Referral $referral)
    {
        if($user->hasPermissionTo('View Only Referrals')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if($user->hasPermissionTo('Create Referrals')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Referral $referral)
    {
        if($user->hasPermissionTo('Update Referrals')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Referral $referral)
    {
        if($user->hasPermissionTo('Delete Referrals')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $Referral
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Referral $referral)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Referral  $Referral
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Referral $referral)
    {
        //
    }
}
