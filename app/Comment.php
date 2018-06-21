<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /** 
     * Defines the link between the Comment and their Blog
     * Return a relationship
     */
    public function blog()
    {
        return $this->belongsTo('App\Blog','blogs_id','id');
    }
}
