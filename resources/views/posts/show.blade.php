@extends('layouts.app')
@section('title','Post')
@section('content')

    <h4>Posted by: {{$post->user->name}}</h4>
    <h5>at: {{$post->created_at}}</h5>
    <p>{{$post->text}}</p>


@endsection