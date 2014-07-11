@extends('layout')
 
@section('content')
    @foreach($companies as $company)
        <p>{{ $company->name }}</p>
        <p>{{ $company->owner }}</p>
    @endforeach
@stop