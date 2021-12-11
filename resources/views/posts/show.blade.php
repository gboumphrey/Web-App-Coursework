@extends('layouts.app')
@section('title','Post')
@section('content')

    <h4>Posted by: <a href="/profiles/{{$post->user->userProfile->id}}">{{$post->user->name}}</a></h4>
    <h5>at: {{$post->created_at}}</h5>
    <p>{{$post->text}}</p>


@endsection