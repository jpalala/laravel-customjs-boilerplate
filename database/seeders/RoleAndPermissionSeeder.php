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
        // NOTE: admin only
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']); //soft


        // NOTE: admin only
        Permission::create(['name' => 'create-announcements']);
        Permission::create(['name' => 'edit-announcements']);
        Permission::create(['name' => 'delete-announcements']);

        // NOTE: anyone who wants to be a writer
        Permission::create(['name' => 'create-articles']);
        Permission::create(['name' => 'edit-articles']);
        Permission::create(['name' => 'delete-articles']);

        // NOTE: allow this for all users
        Permission::create(['name' => 'edit-profile']); //allow only to edit their OWN profile
        Permission::create(['name' => 'change-password']);

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);
        $announcerRole = Role::create(['name' => 'Announcer']);

        $adminRole->givePermissionTo(Permission::all()); //allow all for admin
        $writerRole->givePermissionTo(['edit-profile','change-password','edit-articles','delete-articles','create-articles']); //allow for writers
        $announcerRole->givePermissionTo(['edit-profile', 'change-password','create-announcements','edit-announcements','delete-announcements']);
    }
}
