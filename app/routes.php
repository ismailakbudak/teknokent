<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');
Route::get('/help', 'HomeController@help');

//Route::get('admin/{id}', 'AdminController@show');
Route::get('admins', 'AdminController@index');
Route::resource('admin', 'AdminController',  array('except' => array( 'index')));


/*
        Verb	    Path	                    Action	   Route Name
        ------------------------------------------------------------------
        GET	        /resource	                index	   resource.index
        GET	        /resource/create	        create	   resource.create
        POST	        /resource	                store	   resource.store
        GET	        /resource/{resource}	        show	   resource.show
        GET	        /resource/{resource}/edit	edit	   resource.edit
        PUT/PATCH	/resource/{resource}	        update	   resource.update
        DELETE	        /resource/{resource}	        destroy	   resource.destroy
        
        Examples 
        ------------------------------------------------------------------
        Route::resource('photo', 'PhotoController',  array('only' => array('index', 'show')));
        Route::resource('photo', 'PhotoController',  array('except' => array('create', 'store', 'update', 'destroy')));
        Route::resource('dog', 'DogController');
        
        Change action name
        ------------------------------------------------------------------
        Route::resource('photo', 'PhotoController', array('names' => array('create' => 'photo.build')));
*/
Route::resource('company', 'CompanyController');

 