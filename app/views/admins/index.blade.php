@extends('layout')
 
@section('content')
     <p> {{ link_to_action('AdminController@create', 'Admin Ekle' ) }} </p> 
    @foreach($admins as $admin)
        <!--  
           $url = action('HomeController@getIndex', $params); 
           echo link_to('foo/bar', $title, $attributes = array(), $secure = null);
           echo link_to_route('route.name', $title, $parameters = array(), $attributes = array());
           echo link_to_action('HomeController@getIndex', $title, $parameters = array(), $attributes = array());
           echo secure_url('foo/bar', $parameters = array());
           echo url('foo/bar', $parameters = array(), $secure = null);
        -->
        
        <p> {{  $admin->name ." --  ".link_to_action('AdminController@show', 'Göster', $admin->id ) }} </p>
         
    @endforeach

@stop