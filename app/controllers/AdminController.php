<?php

class AdminController extends \BaseController {

    /**
     * Instantiate a new adminController instance.
     */
    public function __construct()
    {
        $this->beforeFilter(function()
        {
            //
        });
    }

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins = Admin::all();

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
		$email    = Input::get('email');
		$username = Input::get('username');
		$password = Input::get('password');
		$name     = Input::get('name');
		$surname  = Input::get('surname'); 

        $data =  array( 'email'    =>  $email,
                        'username' =>  $username,
                        'password' =>  $password,
                        'name'     =>  $name,
                        'surname'  =>  $surname   );

        $admin = Admin::create($data); 
        return Redirect::action('AdminController@show', array('id' => $admin->id ) );
        //return Redirect::action('UserController@profile', array(1));
        //return View::make('admins.profile', array('admin' => $admin  ));
        //return Redirect::action('HomeController@index');
        //return Redirect::route('profile', array(1));
        //return Redirect::route('profile', array('user' => 1));
        //return Redirect::route('login');
        return Redirect::to('user/login')->with('message', 'Login Failed');
        return Redirect::to('user/login');
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
		//
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
		//
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
		//
	}

}