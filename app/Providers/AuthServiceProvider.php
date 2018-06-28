<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Blog'  =>  'App\Policies\BlogPolicy',
        'App\Comment'  =>  'App\Policies\CommentPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-only', function ($user) {
            if($user->roles_id == 1)
            {
                return true;
            }
            return false;
        });
        Gate::define('is-owner', function ($post) {
            if(Auth::user()->id == $post->user->id)
            {
                return true;
            }
            return false;
        });
    }
    
}
