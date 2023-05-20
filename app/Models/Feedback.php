<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'hostel_utm.feedbacks';

    protected $fillable = ['name', 'email', 'feedback'];
}
