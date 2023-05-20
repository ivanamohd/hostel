<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'contact', 'category', 'description', 'priority', 'status', 'assign', 'hostel', 'evidence', 'contact', 'block', 'floor', 'room', 'role'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['status'] ?? false) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }

        if ($filters['priority'] ?? false) {
            $query->where('priority', 'like', '%' . request('priority') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('status', 'like', '%' . request('search') . '%')
                ->orWhere('priority', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
