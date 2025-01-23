<?php

namespace App\Observers;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }
    public function saved(User $user): void
    {
        if ($user->isDirty('avatar')) {
            Storage::disk('public')->delete($user->getOriginal('avatar'));
        }
    }
 
    public function deleted(User $user): void
    {
        if (! is_null($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
