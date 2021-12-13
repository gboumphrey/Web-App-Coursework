@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <a class="postbtn" href="{{route('posts.create')}}" style="float: right;"> New Post </a>
    <a class="subtitle">Recent posts</a>
    @foreach ($posts as $post)
        <div class="post-box"> 
            <a class="author" href ="{{route('profiles.show', ['id'=> $post->user->userprofile->id])}}">{{$post->user->name}}</a>
            <br><a class="timestamp" href ="{{route('posts.show', ['id'=> $post->id])}}">Posted at {{$post->created_at}} </a>
            <br><a class="posttext">{{$post->text}}</a>
            @if($post->file_path)
                <br><img style="max-width:50%;margin-left:30px" src="/storage/{{$post->file_path}}"></img>
            @endif
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
        </div>
    @endforeach
    <div style="top-padding:50px">
        {{$posts->links()}}
    </div>
@endsection