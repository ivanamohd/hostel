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
            'user_id' => 1,
            'category' => 'awam',
            'description' => $this->faker->paragraph(1),
            'priority' => 'High',
            'status' => 'completed',
            'hostel' => $this->faker->company(),
        ];
    }
}
