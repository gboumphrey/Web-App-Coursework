@extends('layouts.app')

@section('title')
    Submit Post
@endsection

@section('content')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <p>Text: <input type="text" name="text" value="{{old('text')}}"></p>
        <input type ="submit" value="Submit">
        <a href=" {{route('posts.index')}}"> Cancel</a>
    </form>
@endsection