@extends('layouts.app')
@section('title', $userprofile->user->name)
@section('content')

    <h1>{{$userprofile->user->name}}</h1>
    <p>Date of birth: {{$userprofile->dob ?? 'Unspecified'}}</p>
    <p>Favourite colour: {{$userprofile->favecolour ?? 'Unspecified'}}</p>
    <p>About Me: {{$userprofile->aboutme}}

@endsection