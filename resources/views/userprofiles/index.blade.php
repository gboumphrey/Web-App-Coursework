@extends('layouts.app')

@section('title')
    Profiles
@endsection

@section('content')
    <h1>Profiles</h1>
    <ul>
        @foreach ($userprofiles as $profile)
        <li> {{$profile->user->name}}</li>
        @endforeach
    </ul>
@endsection