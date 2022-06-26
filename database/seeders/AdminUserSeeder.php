<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
            'preferred_login' => 'password',
            'github_id' => '048'
        ]);
        $insertedId = DB::getPdo()->lastInsertId();
//        $user = User::find($insertedId);
        echo "Insert new admin user w/ id:" . $insertedId;
//        $user->assignRole(['edit-profile', 'change-password', 'create-users','create-articles','create-announcements','delete-users','delete-articles','delete-announcements']);

    }
}
