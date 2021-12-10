<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        $me->password = 'password';
        $me->remember_token = 'remembertk';
        $me->save();

        $users = User::factory()->count(4)->create();

    }
}
