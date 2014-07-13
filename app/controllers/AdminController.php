<?php

class AdminController extends \BaseController {

    /**
     * Instantiate a new adminController instance.
     * Now we need to make sure to protect our POST actions from CSRF attacks 
     * by setting the CSRF before filter within our
     *
     */
    public function __construct()
    {    
    	$this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth-admin' );
        /*
        $this->beforeFilter( function(){ 
            if ( !Auth::admin()->check() ) return Redirect::to('login')->with('message',"Lütfen giriş yapınız!");
        } ,array('except'=>'index') );
        */
        //$this->beforeFilter('auth', array('only'=>array('getDashboard')));  	 
    }

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
 
		$admins = Admin::paginate(20);
        
		//$admins = Admin::all();
                                                  
        return View::make('admins.index')->with('admins', $admins);
        
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admins.create'); 
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		/*
		$email    = Input::get('email');
		$username = Input::get('username');
		$password = Input::get('password');
		$name     = Input::get('name');
		$surname  = Input::get('surname'); 
        */
        $input = Input::all();
       
       /*
        $validation = Validator::make( Input::all(), Admin::$rules, Admin::$messages);  
        if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation);
        }
        return "ismail"; 
        */
       
        // Check data
        $validation = Validator::make($input, Admin::$rules, Admin::$messages );
        if ($validation->passes())
        {   
        	$admin = Admin::create($input); 
	  	    $admin->password = Hash::make(Input::get('password'));
            $admin->save();

	  	    Session::flash('success', 'Yönetici başarıyla oluşturuldu!');      
	        return Redirect::action('AdminController@show', array('id' => $admin->id ) );
	        //return Redirect::action('UserController@profile', array(1));
	        //return View::make('admins.profile', array('admin' => $admin  ));
	        //return Redirect::action('HomeController@index');
	        //return Redirect::route('profile', array(1));
	        //return Redirect::route('profile', array('user' => 1));
	        //return Redirect::route('login');
	        //return Redirect::to('user/login')->with('message', 'Login Failed');
            //return Redirect::to('user/login');
	    }
	    // Redirect::action('AdminController@create')
        return Redirect::back() 
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.');
    }

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{ 
         $admin = Admin::find($id);
         
       // return   View::make('admins.profile')->with('admin', $admin);
          return View::make('admins.profile', array('admin' => $admin  ));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $admin = Admin::find($id); 
        return View::make('admins.edit', array('admin' => $admin  ));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	     
		$validator = Validator::make(Input::all(), Admin::rules2($id), Admin::$messages);
		// process the login
		if ($validator->passes()) {
			// store
			$admin = Admin::find($id);
			$admin->name     = Input::get('name');
			$admin->surname  = Input::get('surname');
			$admin->email    = Input::get('email');
			$admin->username = Input::get('username');
			$admin->save();

			// redirect
			Session::flash('success', 'Yönetici başarıyla güncellendi!');
			return Redirect::to('admin/' . $admin->id );
		}

	    return Redirect::to('admin/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		  
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    // delete
		$admin = Admin::find($id);
		$admin->delete();

		// redirect
		Session::flash('success', 'Yönetici başarıyla silindi!');
		return Redirect::to('admins');
	}

}