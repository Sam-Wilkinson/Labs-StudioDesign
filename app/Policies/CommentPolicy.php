<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

        /**
     * Runs before other checks, if false will pass below. If true, it will avoid all other checks.
     * 
     * @return boolean
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
     * @param  \App\Post  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->email == $comment->email;
    }
    
}
