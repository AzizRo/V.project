<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class verifyuser extends Model
{
    //We must define fillable properties
    protected $fillable = [
        'token',
        'user_id',

    ];



    //one to one relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
