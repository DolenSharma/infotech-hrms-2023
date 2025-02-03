<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
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
        if($user->hasPermissionTo('View Users')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        if($user->hasPermissionTo('View Only Users')){
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
        if($user->hasPermissionTo('Create Users')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        if($user->hasPermissionTo('Update Users')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        if($user->hasPermissionTo('Delete Users')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
    public function before(User $user)
{
    // Check if the user has the role "Band - 0" or "Band - I"
    if ($user->hasRole(['band - 0', 'band - I', 'band - II'])) {
        // Check if the current time is within office hours (Monday to Friday)
        $now = now('Asia/Kathmandu');
        $dayOfWeek = $now->dayOfWeek;
        $office_hours_start = '10:30:00';
        $office_hours_end = '5:45:00';
        if ($dayOfWeek >= 1 && $dayOfWeek <= 5 && !$now->between($now->copy()->setTimeFromTimeString($office_hours_start), $now->copy()->setTimeFromTimeString($office_hours_end))) {
            auth()->logout();
            return "Login in office hours";
        } elseif (($dayOfWeek == 6 || $dayOfWeek == 0)) {
            auth()->logout();
            return "Weekend";
        }
    }
}

}
