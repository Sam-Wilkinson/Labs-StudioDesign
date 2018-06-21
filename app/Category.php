<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Defines the relationship between the category and their blogs
     * Returns a relationship
     */
    public function blogs()
    {
        return $this->hasMany('App\Blog','categories_id','id');
    }
}
