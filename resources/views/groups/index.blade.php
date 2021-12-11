@extends('layouts.app')

@section('title')
    Groups
@endsection

@section('content')
    <h1>Groups</h1>
    <ul>
        @foreach ($groups as $group)
        <li> <a href ="{{route('groups.show', ['id'=> $group->id])}}"> {{$group->name}}</a></li>
        @endforeach
    </ul>
@endsection