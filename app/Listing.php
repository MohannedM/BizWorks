<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    protected $fillable = [
        'name',
        'website',
        'email',
        'phone',
        'address',
        'description',
        'is_private',
        'photo'
    ];
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
