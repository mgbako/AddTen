<?php

namespace Scholrs;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  ['email', 'password', 'firstname', 
        'lastname', 'userId', 'phone', 'dob', 'address', 'state',
        'nationality', 'type', 'image', 'slug'
        ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function student() {
        return $this->belongsTo('Scholrs\Student');
    }

    public function teacher() {
        return $this->belongsTo('Scholrs\Teacher');
    }

    public function admin() {
        return $this->belongsTo('Scholrs\Admin');
    }

    public function photos() {
        return $this->morphMany('Scholrs\Photo', 'imageable');
    }
}
