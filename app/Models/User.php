<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\True_;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasRoles;
    // the name of the table in the database
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'first_name',
        'middle_name',
        'family_name',
        'gender',
        'work',
        'Select',
        'phone_no'


    ];


    // one to one relationship
    public function volunteerwork()
    {
        return $this->hasOne(volunteerwork::class, "user_id" ,"WorkID"  );
    }
    // one to many relationship
    public function volunteerworks()
    {
        return $this->hasMany(volunteerwork::class, "user_id" , "WorkID" );
    }


    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
    }
    public function hasRole($role)
    {
        if ($this->roles()->where("name" , $role)->first())
        {
            return true  ;
        }


        return false  ;
    }




    // one to one relationship

    public function verifyuser()
    {
        return $this->hasOne('App\Models\verifyuser');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
}
