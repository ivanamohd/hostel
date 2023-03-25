<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(6)->create();
        Report::factory(5)->create();
    }
}
