<?php

namespace App\Policies;

use App\User;
use App\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;
    /**
     * Runs before other checks, if false will pass below. If true, it will avoid all other checks.
     * 
     * @return 
     */
    public function before($user, $ability)
    {
        if($user->isAdmin()){
            return true;
        }  
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        return $user->id == $blog->users_id;
    }
}
