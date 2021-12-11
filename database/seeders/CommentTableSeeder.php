<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\UserProfile;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Comment;
        $c1->text = "Comment by George on George's post";
        $c1->user_id = 1;
        $c1->commentable_type = Post::class;
        $c1->commentable_id = 1;
        $c1->save();

        $c2 = new Comment;
        $c2->text = "Comment by other user on random user's profile";
        $c2->user_id = 2;
        $c2->commentable_type = UserProfile::class;
        $c2->commentable_id = UserProfile::inRandomOrder()->first()->id;
        $c2->save();
    }
}
