@extends('layouts.app')

@section('title')
    Submit Post
@endsection

@section('content')
    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <p>Text: <input type="text" name="text" value="{{old('text')}}"></p>
        <p>Image: <input type="file" name="file">
        <input type ="submit" value="Submit">
        <a href=" {{route('posts.index')}}"> Cancel</a>
    </form>
@endsection