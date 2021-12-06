<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    public $timestamps=true;

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
