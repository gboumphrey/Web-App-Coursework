@extends('layouts.app')

@section('title')
    Edit Comment
@endsection

@section('content')
    <a class="subtitle"> Editing Comment </a>
    <div class="post-box">
        <div class="comment-box" style="background-color:white;">
            <form class="add-comment" method="POST" action="{{route('comments.update', ['id' => $comment->id])}}">
                @csrf
                @method('PATCH')
                <textarea rows="4" type="text" name="text">{{$comment->text}}</textarea><br>
                <button style="float:right" type ="submit">Submit</button>
                <a href=" {{route('posts.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection