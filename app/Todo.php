<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'due',
        'user_id',
        'listing_id'
    ];

    public function listing(){
        return $this->hasOne('App\Listing');
    }
}
