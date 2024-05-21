<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission;
use Illuminate\Support\Str;

class SubmissionObserver
{


        /**

     * Handle the Product "created" event.

     *

     * @param  \App\Models\Submission  $submission

     * @return void

     */

     public function creating(Submission $submission)

     {

         $submission->id = Str::slug($submission->id);

     }
    /**
     * Handle the Submission "created" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function created(Submission $submission)
    {
        $submission->submission_id = 'SUB'.$submission->id; //
        $submission->current_user_name = Auth::User()->name;  //To get current users in the list or view
        $submission->save();

    }

    /**
     * Handle the Submission "updated" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function updated(Submission $submission)
    {
        //
    }
    /**
     * Handle the Submission "deleted" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function deleted(Submission $submission)
    {
        //
    }

    /**
     * Handle the Submission "restored" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function restored(Submission $submission)
    {
        //
    }

    /**
     * Handle the Submission "force deleted" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function forceDeleted(Submission $submission)
    {
        //
    }
}
