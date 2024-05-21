<?php

namespace App\Observers;

use App\Models\Interview;
use Illuminate\Support\Str;

class InterviewObserver
{

    public function creating(Interview $interview)

    {

        $interview->id = Str::slug($interview->id);

    }
    /**
     * Handle the Interview "created" event.
     *
     * @param  \App\Models\Interview  $interview
     * @return void
     */
    public function created(Interview $interview)
    { 
        $interview->interview_id = 'INT'.$interview->id;  
        $interview->save();
    }

    /**
     * Handle the Interview "updated" event.
     *
     * @param  \App\Models\Interview  $interview
     * @return void
     */
    public function updated(Interview $interview)
    {
        //
    }

    /**
     * Handle the Interview "deleted" event.
     *
     * @param  \App\Models\Interview  $interview
     * @return void
     */
    public function deleted(Interview $interview)
    {
        //
    }

    /**
     * Handle the Interview "restored" event.
     *
     * @param  \App\Models\Interview  $interview
     * @return void
     */
    public function restored(Interview $interview)
    {
        //
    }

    /**
     * Handle the Interview "force deleted" event.
     *
     * @param  \App\Models\Interview  $interview
     * @return void
     */
    public function forceDeleted(Interview $interview)
    {
        //
    }
}
