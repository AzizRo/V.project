<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class volunteerwork extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // the name of the table in the database
    protected $table = "volunteerworks";
    // the name of the primary key in the table
    protected $primaryKey = 'WorkID';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    //We must define fillable properties
    protected $fillable = [
        'Name',
        'Description',
        'Skills',
        'Tasks',
        'Benefits',
        'Communication',
        'Volunteernum',
        'StartDate',
        'EndDate',
        'Duration',
        'volunteer_hours',
        'Gender',
        'Major',
        'Location',
        'Field',
        'user_id'
    ];





    public function user()

    {
        return $this->belongsTo(User::class , "user_id" , "id");
       // ->withPivot( "volunteerwork_user",'V_WorkID');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
       // 'email_verified_at' => 'datetime',
    ];
}
