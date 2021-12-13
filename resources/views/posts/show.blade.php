@extends('layouts.app')
@section('title','Post')
@section('content')

    <div class="post-box"> 
        <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a>
        <br><a class="timestamp" href ="{{route('posts.show', ['id'=> $post->id])}}">Posted at {{$post->created_at}} </a>
        <br><a class="posttext">{{$post->text}}</a>
    </div>
    @if(Auth::check())
        @if(Auth::id()==$post->user->id || Auth::user()->is_admin)
            <form class="editbtn" method="GET" action="{{route('posts.edit', ['id'=>$post->id])}}"> 
                @csrf
                <input type ="submit" value="Edit">
            </form>
            <form class="delbtn" method="POST" action="{{route('posts.destroy', ['id' => $post->id])}}">
                @csrf
                @method('DELETE')
                <input type ="submit" value="Delete">
            </form>
        @endif
    @endif


@endsection