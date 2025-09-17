<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@suportmaba.udinus.ac.id',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Create regular users
        $users = [
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
                        [
                'name' => 'Adif Sulthan',
                'email' => 'adif@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Rina Susanti',
                'email' => 'rina.susanti@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Andi Pratama',
                'email' => 'andi.pratama@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}