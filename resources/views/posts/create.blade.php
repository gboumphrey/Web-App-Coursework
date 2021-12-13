@extends('layouts.app')

@section('title')
    Submit Post
@endsection

@section('content')
    <a class="subtitle"> Create Post </a>
    <div class="post-box">
        <div class="comment-box" style="background-color:white;">
            <form class="add-comment" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
                <textarea rows="4" name="text">{{old('text')}}</textarea><br>
                <input type="file" name="file">
                <button style="float:right;" type="submit">Submit</button>
                <a href=" {{route('posts.index')}}"style="float:right"> Cancel</a>
            </form>
        </div>
    </div>
    
@endsection