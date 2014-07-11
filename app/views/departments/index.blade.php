@extends('layout')
 
@section('content')
    @foreach($departments as $department)
        <p>{{ $department->name }}</p> 
    @endforeach
@stop