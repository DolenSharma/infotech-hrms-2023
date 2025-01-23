<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Bdmpost;
use App\Models\Consultant;
use App\Models\Interview;
use App\Models\Referral;
use App\Models\Post;
use App\Models\Submission;
use App\Observers\UserObserver;
use App\Models\Uploadownprofile;
use App\Observers\SubmissionObserver;
use App\Observers\InterviewObserver;
use App\Observers\ConsultantObserver;
use App\Observers\ReferralObserver;
use App\Observers\PostObserver;
use App\Observers\BdmpostObserver;
use App\Observers\UploadownprofileObserver;
use App\Models\Layer;
use App\Observers\LayerObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Submission::observe(SubmissionObserver::class);
        Consultant::observe(ConsultantObserver::class);
        Interview::observe(InterviewObserver::class);
        Referral::observe(ReferralObserver::class);
        Post::observe(PostObserver::class);
        Uploadownprofile::observe(UploadownprofileObserver::class);
        Bdmpost::observe(BdmpostObserver::class);
        Layer::observe(LayerObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
