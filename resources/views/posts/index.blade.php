@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <p>Recent posts</p>
    <ul>
        @foreach ($posts as $post)
        <li> {{$post->user->name}} says {{$post->text}}</li>
        @endforeach
    </ul>
@endsection