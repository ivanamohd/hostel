<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(6)->create();

        // $user = User::factory()->create([
        //     'name' => 'John Doe',
        //     'email' => 'john@gmail.com'
        // ]);

        // Report::factory(5)->create();
        // Report::factory(5)->create([
        //     'user_id' => $user->id
        // ]);

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'contact' => '0718290999',
                'hostel' => 'Admin',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 2,
            ],
            [
                'name' => 'Siti',
                'email' => 'siti@example.com',
                'contact' => '071372837',
                'hostel' => 'Kolej 9',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            [
                'name' => 'Hana',
                'email' => 'hana@example.com',
                'contact' => '071372837',
                'hostel' => 'Kolej 9',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            [
                'name' => 'Abu',
                'email' => 'abu@example.com',
                'contact' => '0718392212',
                'hostel' => 'Kolej 10',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            [
                'name' => 'student1k9',
                'email' => 'student1k9@example.com',
                'contact' => '0192719922',
                'hostel' => 'Kolej 9',
                'block' => 'UA2',
                'floor' => '1',
                'room' => '1122',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ],
            [
                'name' => 'student2k9',
                'email' => 'student2k9@example.com',
                'contact' => '0163920192',
                'hostel' => 'Kolej 9',
                'block' => 'UA2',
                'floor' => '2',
                'room' => '2122',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ],
            [
                'name' => 'student1k10',
                'email' => 'student1k10@example.com',
                'contact' => '0147382948',
                'hostel' => 'Kolej 10',
                'block' => 'UB2',
                'floor' => '1',
                'room' => '1081',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ],
            [
                'name' => 'student1krp',
                'email' => 'student1krp@example.com',
                'contact' => '0123728193',
                'hostel' => 'Kolej Rahman Putra',
                'block' => 'WA1',
                'floor' => '1',
                'room' => '1001',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ],
            [
                'name' => 'student1ktf',
                'email' => 'student1ktf@example.com',
                'contact' => '0148390932',
                'hostel' => 'Kolej Tun Fatimah',
                'block' => 'SA1',
                'floor' => '2',
                'room' => '2001',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role' => 0,
            ]
        ];

        $reports = [
            [
                'user_id' => 5,
                'name' => 'student1k9',
                'email' => 'student1k9@example.com',
                'contact' => '0192719922',
                'category' => 'Elektrik',
                'description' => 'The plug is not working',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 9',
                'block' => 'UA2',
                'floor' => '1',
                'room' => '1122',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 5,
                'name' => 'student1k9',
                'email' => 'student1k9@example.com',
                'contact' => '0192719922',
                'category' => 'Elektrik',
                'description' => 'The light is not working',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 9',
                'block' => 'UA2',
                'floor' => '1',
                'room' => '1122',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 6,
                'name' => 'student2k9',
                'email' => 'student2k9@example.com',
                'contact' => '0163920192',
                'category' => 'Elektrik',
                'description' => 'The fan is not working',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 9',
                'block' => 'UA2',
                'floor' => '2',
                'room' => '2122',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 8,
                'name' => 'student1krp',
                'email' => 'student1krp@example.com',
                'contact' => '0123728193',
                'category' => 'Perabot',
                'description' => 'My table is broken',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej Rahman Putra',
                'block' => 'WA1',
                'floor' => '1',
                'room' => '1001',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 8,
                'name' => 'student1krp',
                'email' => 'student1krp@example.com',
                'contact' => '0123728193',
                'category' => 'Perabot',
                'description' => 'My chair is broken',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej Rahman Putra',
                'block' => 'WA1',
                'floor' => '1',
                'room' => '1001',
                'assign' => 'Unassigned',
            ],
            [
                'user_id' => 7,
                'name' => 'student1k10',
                'email' => 'student1k10@example.com',
                'contact' => '0147382948',
                'category' => 'Awam',
                'description' => 'My door cannot open',
                'priority' => 'Unassigned',
                'status' => 'Pending',
                'hostel' => 'Kolej 10',
                'block' => 'UB2',
                'floor' => '1',
                'room' => '1081',
                'assign' => 'Unassigned',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach ($reports as $report) {
            Report::create($report);
        }
    }
}