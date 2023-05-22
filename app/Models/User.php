<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'hostel',
        'password_reset',
        'password',
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

    // Relationship with Reports
    public function reports()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

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
            $query->where('block', 'like', '%' . request('search') . '%')
                ->orWhere('floor', 'like', '%' . request('search') . '%')
                ->orWhere('room', 'like', '%' . request('search') . '%')
                ->orWhere('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('contact', 'like', '%' . request('search') . '%');
        }
    }
}
