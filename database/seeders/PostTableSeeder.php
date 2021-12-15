<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new Post;
        $p1->text = "This is a post by George";
        $p1->user_id = 1; //1 = george
        $p1->save();
        
        
        $posts = Post::factory()->count(25)->create();
    }
}
