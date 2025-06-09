<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::UpdateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        Role::UpdateOrCreate(
            ['name' => 'siswa'],
            ['name' => 'siswa']
        );

        Role::UpdateOrCreate(
            ['name' => 'guest'],
            ['name' => 'guest']
        );
    }
}
