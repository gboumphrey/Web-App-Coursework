<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    
        $this->call(GroupTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $groups = Group::get();
        User::get()->each(function ($user) use ($groups) {
            $user->groups()->attach(
                $groups->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}