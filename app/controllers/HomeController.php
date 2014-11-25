<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	 */

	public function home() {

		//$com = array('name' => 'isoa', 'email' => 'isoasdasd', 'password'=> '1234' );
		////Company::create( $com  );
		//$ad = Auth::company()->attempt($com);
		//dd($ad);
		return View::make('home');
	}

	public function help() {
		return View::make('help');
	}

	public function showLogin() {
		// show the form
		return View::make('login');
	}

	public function doLogin() {
		// validate the info, create rules for the inputs
		$rules = array(
			'username' => 'required', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3'// password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
			->withErrors($validator)// send back all errors to the login form
			->withInput(Input::except('password'));// send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$admindata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')//Hash::make(Input::get('password'))
			);

			// attempt to do the login
			if (Auth::admin()->attempt($admindata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				return Redirect::to('admins')->with('success', 'Uygulamamıza hoş geldiniz!');

			} else {

				// validation not successful, send back to form
				return Redirect::to('login')->withInput()
				                            ->withErrors(array('message' => 'Geçersiz kullanıcı adı veya şifre!'));
				//->with('message', 'Geçersiz kullanıcı adı veya şifre!');

			}
		}
	}

	public function doLogout() {
		Auth::admin()->logout();// log the user out of our application
		return Redirect::to('login')->with('success', 'Güvenli bir şekilde çıkış yaptınız!');// redirect the user to the login screen
	}

}
