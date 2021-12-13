@extends('layouts.app')

@section('title')
    Profiles
@endsection

@section('content')
    <a class="subtitle">Profiles</a><br>
    @foreach ($userprofiles as $profile)
        <div class="el"><a href ="{{route('profiles.show', ['id'=> $profile->id])}}"> {{$profile->user->name}}</a> </div> 
    @endforeach
@endsection