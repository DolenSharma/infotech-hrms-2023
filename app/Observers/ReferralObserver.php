<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Referral;
use Illuminate\Support\Str;
class ReferralObserver
{


        /**

     * Handle the Product "created" event.

     *

     * @param  \App\Models\Referral  $Referral

     * @return void

     */

     public function creating(Referral $Referral)

     {

         $Referral->id = Str::slug($Referral->id);

     }
    /**
     * Handle the Referral "created" event.
     *
     * @param  \App\Models\Referral  $Referral
     * @return void
     */
    public function created(Referral $Referral)
    {
        $Referral->referral_id = 'REF'.$Referral->id; //
        $Referral->user_id = Auth::User()->id;  //To get current users in the list or view
        $Referral->save();

    }

    /**
     * Handle the Referral "updated" event.
     *
     * @param  \App\Models\Referral  $Referral
     * @return void
     */
    public function updated(Referral $Referral)
    {
        //
    }
    /**
     * Handle the Referral "deleted" event.
     *
     * @param  \App\Models\Referral  $Referral
     * @return void
     */
    public function deleted(Referral $Referral)
    {
        //
    }

    /**
     * Handle the Referral "restored" event.
     *
     * @param  \App\Models\Referral  $Referral
     * @return void
     */
    public function restored(Referral $Referral)
    {
        //
    }

    /**
     * Handle the Referral "force deleted" event.
     *
     * @param  \App\Models\Referral  $Referral
     * @return void
     */
    public function forceDeleted(Referral $Referral)
    {
        //
    }
}
