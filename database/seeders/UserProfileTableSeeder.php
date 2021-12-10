<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserProfile;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $me = new UserProfile;
        $me->aboutme = 'Hello, this is an about me section';
        $me->favecolour = 'Yellow';
        $me->user_id = 1;
        $me->save();

    }
}
