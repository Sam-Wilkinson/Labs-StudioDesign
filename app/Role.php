<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Defines the relationship between the role and their users
     * Returns a relationship
     */
    public function users()
    {
        return $this->hasMany('App\User','roles_id','id');
    }
}
