<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'hostel_utm.users';

    protected $fillable = [
        'name',
        'email',
        'contact',
        'hostel',
        'block',
        'floor',
        'room',
        'password',
        'password_reset',
    ];
}
