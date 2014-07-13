<?php


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Company extends Eloquent implements UserInterface, RemindableInterface {
 
    
    use UserTrait, RemindableTrait;
	
	protected $guarded = array('id');

	protected $fillable =  array(  'email', 'name', 'password', 'owner');
   
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';
}