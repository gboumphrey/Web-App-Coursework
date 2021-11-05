<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $me = new Person;
        $me->name = 'George';
        $me->email = 'george@email.com';
        $me->save();

        $people = Person::factory()->count(4)->create();

    }
}
