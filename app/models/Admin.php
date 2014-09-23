<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	
	protected $guarded = array('id');

	protected $fillable =  array(  'email', 'username', 'password', 'name', 'surname');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'admins';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	 *  Rules for admin enttity 
	 */
	public static $rules = array(
	  'username'=> 'required|unique:admins|min:5|max:50',
	  'name'    => 'required',
	  'surname' => 'required',
	  'email'   => 'required|email',
	  'password'=> 'required|alphaNum|min:4|max:50',
	  'password_confirm' => 'required|same:password',
	);
	
	/**
	 *  Rules for admin enttity  edit
	 */
	public static function rules2($id=0){
	    return  array(
		  'username'=> 'required|min:5|max:50|unique:admins,username,'.$id,
		  'name'    => 'required',
		  'surname' => 'required',
		  'email'   => 'required|email' );
	}

 

	/*
	|--------------------------------------------------------------------------
	| Custom Error messages
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/	
	public static $messages = array(
           'username.required'	=> 'Kullanıcı adı belirtmelisiniz.',
           'username.min'	    => 'Seçtiğiniz kullanıcı adı minimum 5 karakter olmalıdır.',
           'username.max'	    => 'Seçtiğiniz kullanıcı adı maximum 50 karakter olmalıdır.',
           'username.unique'	=> 'Seçtiğiniz kullanıcı adı başka bir kullanıcı tarafından kaydedilmiş.',
           
           'name.required'   	=> 'İsim belirtmelisiniz.',
             
           'surname.required'	=> 'Soyisim belirtmelisiniz.',
             
           'email.required'	    => 'E-Posta adresinizi yazmalısınız.',
           'email.email'	    => 'Belirttiğiniz e-posta adresi geçerli değil, lütfen yazım hatalarını kontrol ediniz.',
         
           'password.required'	=> 'Şifre belirtmelisiniz.',
           'password.min'	    => 'Şifreniz minimum 4 karakterden oluşmalıdır.',
           'password.max'	    => 'Şifreniz maximum 50 karakter olmalıdır.',

           'password_confirm.required' => 'Şifre tekrarı belirtmelisiniz.',
           'password_confirm.same'     => 'Şifre alanı ile şifre tekrarı aynı olmalıdır.',  
    );	
}
