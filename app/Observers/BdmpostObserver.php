<?php

namespace App\Observers;

use App\Models\Bdmpost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BdmpostObserver
{

    public function creating(Bdmpost $bdmpost)

    {

        $bdmpost->id = Str::slug($bdmpost->id);

    }
    /**
     * Handle the Bdmpost "created" event.
     *
     * @param  \App\Models\Bdmpost  $bdmpost
     * @return void
     */
    public function created(Bdmpost $bdmpost)
    {
        $bdmpost->bdmpost_id = 'BDM'.$bdmpost->id; //
        $bdmpost->dbm_current_user_name = Auth::User()->name;
        $bdmpost->user_id = Auth::User()->id;  //
        $bdmpost->save();
    }

    /**
     * Handle the Bdmpost "updated" event.
     *
     * @param  \App\Models\Bdmpost  $bdmpost
     * @return void
     */
    public function updated(Bdmpost $bdmpost)
    {
        //
    }

    /**
     * Handle the Bdmpost "deleted" event.
     *
     * @param  \App\Models\Bdmpost  $bdmpost
     * @return void
     */
    public function deleted(Bdmpost $bdmpost)
    {
        //
    }

    /**
     * Handle the Bdmpost "restored" event.
     *
     * @param  \App\Models\Bdmpost  $bdmpost
     * @return void
     */
    public function restored(Bdmpost $bdmpost)
    {
        //
    }

    /**
     * Handle the Bdmpost "force deleted" event.
     *
     * @param  \App\Models\Bdmpost  $bdmpost
     * @return void
     */
    public function forceDeleted(Bdmpost $bdmpost)
    {
        //
    }
}
