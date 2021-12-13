<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g1 = new Group;
        $g1->name = "I like the colour Yellow";
        $g1->save();
        $g2 = new Group;
        $g2->name = "Sean Fanclub";
        $g2->save();
        $g3 = new Group;
        $g3->name = "Swansea Third-Years";
        $g3->save();
        $g4 = new Group;
        $g4->name = "DONT JOIN THIS gROUP!!!!";
        $g4->save();
        $g5 = new Group;
        $g5->name = "Dogs";
        $g5->save();
    }
}
