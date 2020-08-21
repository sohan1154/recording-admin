<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class Recording extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'candidate_name', 'candidate_email', 'candidate_mobile', 'file_name', 'recording_start_datetime', 'recording_stop_datetime', 'recording_duration', 'address', 'lat', 'lng'
    ];
    
	public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}