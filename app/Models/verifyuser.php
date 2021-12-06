<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class verifyuser extends Model
{
    protected $fillable = [
        'token',
        'user_id',

    ];




    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
