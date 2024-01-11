<?php

namespace App\Policies;

use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Event $event) {
        if($user->isAdmin() && ($event->show_flag || !$event->show_flag)) {
            return true;
        } else if(($user->isEO() || $user->isMember()) && $event->show_flag) {
            return true;
        }

        return false;
    }
}
