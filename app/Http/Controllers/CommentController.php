<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\UserProfile;
use App\Models\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments.index');
    }

    public function apiIndex()
    {
        $comments = Comment::get();
        return $comments;
    }

    public function apiIndexOnPostId($id){
        $comments = Comment::where('commentable_type', 'App\Models\Post')->where('commentable_id', $id)->get();
        $arr = [];
        foreach($comments as $comment) {
            $comment["username"] = User::find($comment->user_id)->name;
            array_push($arr, $comment);
        }
        return $arr;
    }
    
    public function apiIndexOnProfileId($id){
        $comments = Comment::where('commentable_type', 'App\Models\UserProfile')->where('commentable_id', $id)->get();
        $arr = [];
        foreach($comments as $comment) {
            $comment["username"] = User::find($comment->user_id)->name;
            array_push($arr, $comment);
        }
        return $arr;
    }
    
    public function apiDestroy($id){
        $comment = Comment::findOrFail($id);        
        $comment->delete();
    }

    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255'
        ]);
        $c = new Comment();
        $c->user_id = $request['user_id'];
        $c->text= $validatedData['text'];
        $c->commentable_type = $request['commentable_type'];
        $c->commentable_id = $request['commentable_id'];
        $c->created_at = now();
        $c->updated_at = now();
        $c->save();
        $c["username"] = User::find($c->user_id)->name;
        return $c;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
