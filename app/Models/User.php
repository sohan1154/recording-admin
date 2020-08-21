<?php

namespace App;
// namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Models\Community;
use App\Models\District;
use App\Models\Recording;

class User extends Authenticatable
{
    // use HasApiTokens, Notifiable, SoftDeletes;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password', 'mobile', 'image', 'address', 'lat', 'lng', 'random_token', 'token_status', 'is_verified', 'status', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = ['deleted_at'];

    
	// public function Recording() {
    //     return $this->belongsTo('App\Models\Recording', 'user_id');
    // }
    public function recordings() {
        return $this->hasMany(Recording::class, 'user_id');
    }
    
}
