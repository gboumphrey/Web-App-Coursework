<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $me = new User;
        $me->name = 'George Boumphrey';
        $me->email = 'george@email.com';
        $me->email_verified_at = now();
        $me->password = Hash::make('password');
        $me->remember_token = 'remembertk';
        $me->save();

        $admin = new User;
        $admin->name = 'Admin Man';
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = now();
        $admin->password = Hash::make('admin');
        $admin->remember_token = 'remembertk';
        $admin->is_admin = True;
        $admin->save();

        $users = User::factory()->count(8)->has(UserProfile::factory())->create();

    }
}
