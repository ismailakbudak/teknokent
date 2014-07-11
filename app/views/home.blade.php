@extends('layout')
 
@section('content')
   <h1> Hoş geldiniz </h1>
   <p>{{ link_to_action('AdminController@index', 'Yöneticiler') }}  </p>
@stop