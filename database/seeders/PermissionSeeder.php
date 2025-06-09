<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::UpdateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        $role_siswa = Role::UpdateOrCreate(
            ['name' => 'siswa'],
            ['name' => 'siswa']
        );

        $role_guest = Role::UpdateOrCreate(
            ['name' => 'guest'],
            ['name' => 'guest']
        );

        $permission = Permission::updateOrCreate(

            ['name' => 'view_dashboard'],
            ['name' => 'view_dashboard']

        );

        $permission2 = Permission::updateOrCreate(

            ['name' => 'view_home'],
            ['name' => 'view_home']

        );

        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_siswa->givePermissionTo($permission2);

        $user = User::find(1); 
        $user2 = User::find(17); 
        

        $user->assignRole(['admin']);
        $user2->assignRole(['siswa']);
        
    }
}
