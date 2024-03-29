<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:255',
            'file' => 'mimes:jpg,bmp,png'
        ]);
        
        $in = new Post;
        $in->user_id = Auth::id();
        $in->text = $validatedData['text'];
        if(array_key_exists('file', $validatedData)){
            $in->file_path = $validatedData['file']->hashName();
            $validatedData['file']->store('public');
        }
        $in->save();
        session()->flash('message', 'Post added');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        if($post->user_id == Auth::id() || Auth::user()->is_admin) {
            return view('posts.edit', ['post' => $post]);
        }
        else {
            return back()->withErrors(['error' => 'You do not have permission to edit this.']);
        }
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
        $validatedData = $request->validate([
            'text' => 'required|max:255'
        ]);

        $post = Post::findOrFail($id);
        if($post->user_id == Auth::id() || Auth::user()->is_admin) {
            $post->text = $validatedData['text'];
            $post->save();
            session()->flash('message', 'Post edited');
            return view('posts.show', ['post' => $post]);
        }
        else {
            return back()->withErrors(['error' => 'You do not have permission to edit this.']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id == Auth::id() || Auth::user()->is_admin) {
            $post->delete();
            
            session()->flash('message', 'Post deleted');
            return redirect()->route('posts.index');
        }
        else {
            return back()->withErrors(['error' => 'You do not have permission to delete this.']);
        };
    }
}
