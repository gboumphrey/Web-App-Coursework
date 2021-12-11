@extends('layouts.app')

@section('title')
    Groups
@endsection

@section('content')
    <h1>Groups</h1>
    <ul>
        @foreach ($groups as $group)
        <li> {{$group->name}}</li>
        @endforeach
    </ul>
@endsection