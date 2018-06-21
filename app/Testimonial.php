<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Testimonial extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /** 
     * Defines the link between the Testimonial and their Client
     * Return a relationship
     */
    public function client()
    {
        return $this->belongsTo('App\Client','clients_id','id');
    }
}
