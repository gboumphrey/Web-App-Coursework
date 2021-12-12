@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <h2> <a href="{{route('posts.create')}}" style="float: right;"> New Post </a></h2>
    <h1>Recent posts</h1>
    @foreach ($posts as $post)
        <div class="post-box"> 
            <h3><a href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a></h3>
            @if(Auth::check())
                @if(Auth::id()==$post->user->id || Auth::id()->is_admin)
                    <p> <a href="{{route('posts.edit', ['id'=>$post->id])}}" style="float: right;"> edit </a></p>
                @endif
            @endif
            <h5><a href ="{{route('posts.show', ['id'=> $post->id])}}">Posted at {{$post->created_at}} </a></h5>
            <p>{{$post->text}}</p>
        </div>
    @endforeach
@endsection