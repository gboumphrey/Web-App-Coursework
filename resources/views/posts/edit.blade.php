@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    <form method="POST" action="{{route('posts.update', ['id' => $post->id])}}">
        @csrf
        @method('PATCH')
        <p>Text: <input type="text" name="text" value="{{$post->text}}"></p>
        <input type ="submit" value="Submit">
        <a href=" {{route('posts.index')}}">Cancel</a>
    </form>
@endsection