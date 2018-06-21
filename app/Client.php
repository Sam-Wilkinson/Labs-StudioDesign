<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * Defines the relationship between the Client and their Testimonials
     * Returns a relationship
     */
    public function testimonials()
    {
        return $this->hasMany('App\Testimonial','clients_id','id');
    }
}
