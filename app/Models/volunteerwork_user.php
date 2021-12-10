<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volunteerwork_user extends Model
{
    use HasFactory;
    //We must define fillable properties
    protected $fillable = [


        'volunteer_id',
        'V_WorkID'
    ];
}
