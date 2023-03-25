<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['status'] ?? false) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('status', 'like', '%' . request('search') . '%')
                ->orWhere('priority', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%');
        }
    }

    // public static function find($id)
    // {
    //     $reports = self::all();

    //     foreach ($reports as $report) {
    //         if ($report['id'] == $id) {
    //             return $report;
    //         }
    //     }
    // }
}
