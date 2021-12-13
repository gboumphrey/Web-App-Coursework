@extends('layouts.app')
@section('title', $group->name)

@section('content')
    <div class="bigtitle">{{$group->name}}</div>
    <a class="subtitle">Members</a><br>
    @foreach ($group->users as $user)
        <div class="el"><a href="{{route('profiles.show', ['id'=> $user->userprofile->id])}}"> {{$user->name}}</a> </div> 
    @endforeach
@endsection
