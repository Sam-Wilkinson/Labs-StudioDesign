<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /** 
     * Defines the link between the User and their Role
     * Return a relationship
     */
    public function role()
    {
        return $this->belongsTo('App\Role','roles_id','id');
    }
    /**
     * Defines the relationship between the user and their blogs
     * Returns a relationship
     */
    public function blogs()
    {
        return $this->hasMany('App\Blog','users_id','id');
    }
}
