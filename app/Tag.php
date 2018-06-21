<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Defines the link between the Tags and their Blogs
     * Return a relationship
     */
    public function blogs()
    {
        return $this->belongsToMany('App\Blog', 'tags_has_blogs', 'tags_id', 'blogs_id');
    }
}
