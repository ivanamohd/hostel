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
    ];

    // Filter
    public function scopeFilter($query, array $filters)
    {
        if ($filters['block'] ?? false) {
            $query->where('block', 'like', '%' . request('block') . '%');
        }

        if ($filters['floor'] ?? false) {
            $query->where('floor', 'like', '%' . request('floor') . '%');
        }

        if ($filters['room'] ?? false) {
            $query->where('room', 'like', '%' . request('room') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('block', 'like', '%' . request('block') . '%')
                ->orWhere('floor', 'like', '%' . request('floor') . '%')
                ->orWhere('room', 'like', '%' . request('room') . '%');
            // ->orWhere('name', 'like', '%' . request('name') . '%')
            // ->orWhere('email', 'like', '%' . request('email') . '%')
            // ->orWhere('contact', 'like', '%' . request('contact') . '%');
        }
    }
}