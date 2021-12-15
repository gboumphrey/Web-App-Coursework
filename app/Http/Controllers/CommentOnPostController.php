<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CommentOnPost;

class CommentOnPostController extends Controller
{
    public function sendNotification () 
    {
        $user = User::first();
        $data = [
            'url' => '/posts/1'
        ];

        $user->notify(new CommentOnPost($data));
    }
}
