<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('delete-article', function($user, $article) {
            return $user->id == $article->user_id;
        });

        Gate::define('comment-delete', function($user, $comment){
            return $user->id == $comment->user_id;

        });


    }
}
