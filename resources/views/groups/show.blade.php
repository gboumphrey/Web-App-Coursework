@extends('layouts.app')
@section('title', $group->name)

@section('content')
    <h1>{{$group->name}}</h1>
    <h2>Members</h2>
    <ul>
        @foreach ($group->users as $user)
        <li> {{$user->name}}</li>
        @endforeach
    </ul>
@endsection