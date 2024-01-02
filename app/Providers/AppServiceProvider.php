<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        // ADD, DELETE, EDIT ARTICLE
        Gate::define('manage-article', function (User $user) {
            return $user->isAdmin();
        });

        // APPROVE, REJCT, EDIT, DELETE EVENT
        Gate::define('manage-event', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('register-event', function (User $user) {
            return $user->isMember();
        });

        Gate::define('cancel-register-event', function (User $user) {
            return $user->isMember();
        });

        Gate::define('create-comment', function (User $user, Event $event) {
            return $user->isMember() || ($user->isEO() && $user->id == $event->organizer->user_id);
        });

        Gate::define('delete-comment', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('ban-user', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('upload-event', function (User $user) {
            return $user->isEO();
        });
    }
}
