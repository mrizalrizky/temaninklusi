<?php

namespace App\Policies;

use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class ArticlePolicy
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

    public function view(User $user, Article $article) {
        if($user->isAdmin() && ($article->show_flag || !$article->show_flag)) {
            return true;
        } else if(($user->isEO() || $user->isMember()) && $article->show_flag) {
            return true;
        }

        return false;
    }
}
