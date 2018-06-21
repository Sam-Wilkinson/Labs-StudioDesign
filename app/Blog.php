<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /** 
     * Defines the link between the Blog and their User
     * Return a relationship
     */
    public function user()
    {
        return $this->belongsTo('App\User','users_id','id');
    }
    /** 
     * Defines the link between the Blog and their Category
     * Return a relationship
     */
    public function category()
    {
        return $this->belongsTo('App\Category','categories_id','id');
    }
    /**
     * Defines the link between the Blog and their Tags
     * Return a relationship
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tags_has_blogs', 'blogs_id', 'tags_id');
    }
    /**
     * Defines the relationship between the Blog and their comments
     * Returns a relationship
     */
    public function comments()
    {
        return $this->hasMany('App\Comment','blogs_id','id');
    }
}
