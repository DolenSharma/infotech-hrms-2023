<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Uploadownprofile;
use Illuminate\Support\Str;
class UploadownprofileObserver
{


        /**

     * Handle the Product "created" event.

     *

     * @param  \App\Models\Uploadownprofile  $Uploadownprofile

     * @return void

     */

     public function creating(Uploadownprofile $Uploadownprofile)

     {

         $Uploadownprofile->id = Str::slug($Uploadownprofile->id);

     }
    /**
     * Handle the Uploadownprofile "created" event.
     *
     * @param  \App\Models\Uploadownprofile  $Uploadownprofile
     * @return void
     */
    public function created(Uploadownprofile $Uploadownprofile)
    {
        $Uploadownprofile->uploadownprofile_id = 'PROF'.$Uploadownprofile->id; //
        $Uploadownprofile->user_id = Auth::User()->id;  //To get current users in the list or view
        $Uploadownprofile->save();

    }

    /**
     * Handle the Uploadownprofile "updated" event.
     *
     * @param  \App\Models\Uploadownprofile  $Uploadownprofile
     * @return void
     */
    public function updated(Uploadownprofile $Uploadownprofile)
    {
        //
    }
    /**
     * Handle the Uploadownprofile "deleted" event.
     *
     * @param  \App\Models\Uploadownprofile  $Uploadownprofile
     * @return void
     */
    public function deleted(Uploadownprofile $Uploadownprofile)
    {
        //
    }

    /**
     * Handle the Uploadownprofile "restored" event.
     *
     * @param  \App\Models\Uploadownprofile  $Uploadownprofile
     * @return void
     */
    public function restored(Uploadownprofile $Uploadownprofile)
    {
        //
    }

    /**
     * Handle the Uploadownprofile "force deleted" event.
     *
     * @param  \App\Models\Uploadownprofile  $Uploadownprofile
     * @return void
     */
    public function forceDeleted(Uploadownprofile $Uploadownprofile)
    {
        //
    }
}
