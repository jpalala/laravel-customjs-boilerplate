<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin only
        Permission::create(['name' => 'create-users']);

        //admin only
        Permission::create(['name' => 'create-announcements']);
        Permission::create(['name' => 'edit-announcements']);
        Permission::create(['name' => 'delete-announcements']);

        //anyone authenticated
        Permission::create(['name' => 'create-articles']);
        Permission::create(['name' => 'edit-articles']);
        Permission::create(['name' => 'delete-articles']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']); //soft

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);
        $announcerRole = Role::create(['name' => 'Announcer']);

    }
}
