@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <p>Recent posts</p>
    <ul>
        @foreach ($posts as $post)
        <li> <a href ="/profiles/{{$post->user->userProfile->id}}">{{$post->user->name}}</a> says <a href ="/posts/{{$post->id}}">{{$post->text}} </a></li>
        @endforeach
    </ul>
@endsection