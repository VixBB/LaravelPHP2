<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'siswa2',
                'email' => 'siswa2@gmail.com',
                'nis' => '1123456',
                'nisn' => '11234567890',
                'password' => bcrypt('123'),
            ]
            );
    }
}
