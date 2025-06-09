<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

$oldData = DB::connection('old_mysql')->table('old_table_name')->get();

foreach ($oldData as $row) {
    DB::table('new_table_name')->insert([
        'column1' => $row->column1,
        'column2' => $row->column2,
        // map columns accordingly
    ]);
}
    }
}
