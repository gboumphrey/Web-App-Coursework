@extends('layouts.app')
@section('title', $group->name)

@section('content')
    <h1>{{$group->name}}</h1>
    <h2>Members</h2>
    <ul>
        @foreach ($group->users as $user)
        <li><a href="{{route('profiles.show', ['id'=> $user->userprofile->id])}}"> {{$user->name}}</a></li>
        @endforeach
    </ul>
@endsection