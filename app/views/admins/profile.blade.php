@extends('layout')

@section('content') 
	<p>{{ $admin->id }}</p>
	<p>{{ $admin->email }}</p>
	<p>{{ $admin->name }}</p>
	<p>{{ $admin->surname }}</p>

@stop