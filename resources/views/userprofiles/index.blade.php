@extends('layouts.app')

@section('title')
    Profiles
@endsection

@section('content')
    <a class="subtitle">Profiles</a><br>
    @foreach ($userprofiles as $profile)
        <a href ="{{route('profiles.show', ['id'=> $profile->id])}}"><div class="el"> {{$profile->user->name}}</div> </a> 
    @endforeach
@endsection