<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    // the name of the table in the database
    protected $table = 'certificates';
    //Show the timestamps in the database
    public $timestamps=true;
    //We must define fillable properties that the user will fill
    protected $fillable = [
        'VolunteerName',
        'VolunteerId',
        'WorkId',
        'WorkName',
        'StartDate',
        'EndDate',
        'VolunteeringHours',
        'ProviderName',
        'Status'
    ];

}
