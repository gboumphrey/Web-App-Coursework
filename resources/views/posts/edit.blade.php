@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <a class="subtitle"> Editing Post </a>
    <div class="post-box">
        <div class="comment-box" style="background-color:white;">
            <form class="add-comment" method="POST" action="{{route('posts.update', ['id' => $post->id])}}">
                @csrf
                @method('PATCH')
                <textarea rows="4" type="text" name="text">{{$post->text}}</textarea><br>
                <button style="float:right" type ="submit">Submit</button>
                <a href=" {{route('posts.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection