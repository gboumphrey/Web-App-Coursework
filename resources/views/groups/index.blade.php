@extends('layouts.app')

@section('title')
    Groups
@endsection

@section('content')
    <a class="subtitle">Groups</a><br>
    @foreach ($groups as $group)
        <div class="el"><a href ="{{route('groups.show', ['id'=> $group->id])}}"> {{$group->name}}</a> </div> 
    @endforeach
@endsection