<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
                'name' => 'admin',
               'guard_name' => 'user',
            ]);
        Role::create([
                'name' => 'kasir',
                'guard_name' => 'user',
             ]);
        Role::create([
                'name' => 'owner',
                'guard_name' => 'user',
             ]);
    }
}
