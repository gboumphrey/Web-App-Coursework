@extends('layouts.app')

@section('title')
    Profiles
@endsection

@section('content')
    <h1>Profiles</h1>
    <ul>
        @foreach ($userprofiles as $profile)
        <li><a href ="{{route('profiles.show', ['id'=> $profile->id])}}"> {{$profile->user->name}}</a></li>
        @endforeach
    </ul>
@endsection