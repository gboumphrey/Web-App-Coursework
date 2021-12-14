@extends('layouts.app')

@section('title')
    Groups
@endsection

@section('content')
    <a class="subtitle">Groups</a><br>
    @foreach ($groups as $group)
        <a href ="{{route('groups.show', ['id'=> $group->id])}}"> <div class="el">{{$group->name}}</div> </a> 
    @endforeach
@endsection