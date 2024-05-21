<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Str;
class PostObserver
{


        /**

     * Handle the Product "created" event.

     *

     * @param  \App\Models\Post  $Post

     * @return void

     */

     public function creating(Post $Post)

     {

         $Post->id = Str::slug($Post->id);

     }
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $Post
     * @return void
     */
    public function created(Post $Post)
    {
        $Post->post_id = 'POST'.$Post->id; //
        // $Post->name = Auth::User()->name;  //To get current users in the list or view
        $Post->save();

    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $Post
     * @return void
     */
    public function updated(Post $Post)
    {
        //
    }
    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $Post
     * @return void
     */
    public function deleted(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $Post
     * @return void
     */
    public function restored(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $Post
     * @return void
     */
    public function forceDeleted(Post $Post)
    {
        //
    }
}
