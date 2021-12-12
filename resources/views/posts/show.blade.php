@extends('layouts.app')
@section('title','Post')
@section('content')

    <h4>Posted by: <a href="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a></h4>
    <h5>at: {{$post->created_at}}</h5>
    <p>{{$post->text}}</p>
    @if(Auth::check())
        @if(Auth::id()==$post->user->id || Auth::user()->is_admin)
            <p> <a href="{{route('posts.edit', ['id'=>$post->id])}}" style="float: right;"> edit </a></p>
            <form method="POST" action="{{route('posts.destroy', ['id' => $post->id])}}" style="float:right;">
                @csrf
                @method('DELETE')
                <input type ="submit" value="Delete">
            </form>
        @endif
    @endif


@endsection