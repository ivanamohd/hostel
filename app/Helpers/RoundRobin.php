<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class RoundRobin
{
    public static function selectStaffMember()
    {
        $minutes = 60;

        $staffMembers = Cache::remember('staff_members', $minutes, function () {
            $user = auth()->user();

            return User::where([
                ['role', '=', '1'],
                ['hostel', '=', $user->hostel]
            ])->get();
        });

        if ($staffMembers->count() === 1) {
            return $staffMembers->first();
        }

        $currentStaffIndex = Cache::remember('current_staff_index', $minutes, function () use ($staffMembers) {
            return 0;
        });

        $selectedStaff = $staffMembers[$currentStaffIndex];
        $nextStaffIndex = ($currentStaffIndex + 1) % count($staffMembers);
        Cache::put('current_staff_index', $nextStaffIndex, $minutes);

        return $selectedStaff;
    }
}
