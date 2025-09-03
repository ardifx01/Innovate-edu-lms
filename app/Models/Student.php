<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;
    protected $fillable = [
        'nis',
        'nisn',
        'full_name',
        'classroom_id',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'phone_number',
        'emergency_contact',
        'email',
        'religion',
        'profile_picture',
        'password',
        'role',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
