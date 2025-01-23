<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Uploadownprofile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        if (! is_null($Uploadownprofile->driving_license)) {
            Storage::disk('public')->delete($Uploadownprofile->driving_license);
        }
        if (! is_null($Uploadownprofile->uploaded_cv)) {
            Storage::disk('public')->delete($Uploadownprofile->uploaded_cv);
        }
        if (! is_null($Uploadownprofile->photo)) {
            Storage::disk('public')->delete($Uploadownprofile->photo);
        }
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
    public function saved(Uploadownprofile $uploadownprofile): void
    {
        if ($uploadownprofile->isDirty('driving_license')) {
            Storage::disk('public')->delete($uploadownprofile->getOriginal('driving_license'));
        }
        if ($uploadownprofile->isDirty('uploaded_cv')) {
            Storage::disk('public')->delete($uploadownprofile->getOriginal('uploaded_cv'));
        }
        if ($uploadownprofile->isDirty('photo')) {
            Storage::disk('public')->delete($uploadownprofile->getOriginal('photo'));
        }
    }
 
}
