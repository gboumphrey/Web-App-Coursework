@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <p>Recent posts</p>
    <ul>
        @foreach ($posts as $post)
        <li> <a href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a> says <a href ="{{route('posts.show', ['id'=> $post->id])}}">{{$post->text}} </a></li>
        @endforeach
    </ul>
@endsection