<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'phone' => '085000111222',
                'email' => 'admin@mail.com',
                'password' => Hash::make('111111'),
                'address' => 'Jember',
                'role' => 'admin'
            ],
            [
                'name' => 'User',
                'phone' => '085111222333',
                'email' => 'apip@mail.com',
                'password' => Hash::make('111111'),
                'address' => 'Surabaya'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
