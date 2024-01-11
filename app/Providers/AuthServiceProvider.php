<?php

namespace App\Providers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
        * EVENT : Approve, Reject, Edit, Delete
        * BLOG : Add, Edit, Delete
        * USER : Ban, unban
        * COMMENT: Delete
        */

        Gate::define('is-admin', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('register-event', function (User $user, Event $event) {
            return $user->isMember() && !$user->registeredEvents->contains($event);
        });

        Gate::define('cancel-register-event', function (User $user, Event $event) {
            return $user->isMember() && $user->registeredEvents->contains($event);
        });

        Gate::define('upload-event', function (User $user) {
            return $user->isEO();
        });

        Gate::define('has-events', function (User $user) {
            return $user->isMember() || $user->isEO();
        });
    }
}
