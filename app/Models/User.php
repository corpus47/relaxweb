<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'mobile',
        'zipcode',
        'city',
        'address',
        'account_number',
        'privileg',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_superadmin() {

        if($this->privileg == 0) {
            return true;
        } else {
            return false;
        }

    }

    public function is_admin() {
        if($this->privileg == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function is_user() {
        if($this->privileg == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function is_good() {
        if($this->id == config('global.good_user')) {
            return true;
        } else {
            return false;
        }
    }

}
