<?php

namespace App\Policies;
use App\Models\Uploadownprofile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadownprofilePolicy
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
        if($user->hasPermissionTo('View Own Profile')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Uploadownprofile  $uploadownprofiles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Uploadownprofile $uploadownprofiles)
    {
        if($user->hasPermissionTo('View Only Own Profile')){
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
        if($user->hasPermissionTo('Create Own Profile')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Uploadownprofile  $uploadownprofiles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Uploadownprofile $uploadownprofiles)
    {
        if($user->hasPermissionTo('Update Own Profile')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Uploadownprofile  $uploadownprofiles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Uploadownprofile $uploadownprofiles)
    {
        if($user->hasPermissionTo('Delete Own Profile')){
            return true;
        }return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Uploadownprofile  $uploadownprofiles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Uploadownprofile $uploadownprofiles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Uploadownprofile  $uploadownprofiles
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Uploadownprofile $uploadownprofiles)
    {
        //
    }
}
