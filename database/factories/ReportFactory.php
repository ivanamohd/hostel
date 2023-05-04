<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'user_id' => 1,
                'category' => 'Awam',
                'description' => 'The door is broken',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej Tun Fatimah',
                'block' => 'SA1',
                'floor' => '1',
                'room' => '1022',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 2,
                'category' => 'Elektrik',
                'description' => 'The plug is not working',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 10',
                'block' => 'UB2',
                'floor' => '4',
                'room' => '4221',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 2,
                'category' => 'Elektrik',
                'description' => 'The light is not working',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 10',
                'block' => 'UB2',
                'floor' => '4',
                'room' => '4221',
                'assign' => 'Unassigned',
            ]
        ];
    }
}
