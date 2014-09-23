<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TodoSetup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('users',function(Blueprint $table){
		 		 
		 		 $table->increments('id')->unsigned();
		 		 
		 		 $table->string('first_name');
		 		 $table->string('last_name');
		 		 $table->string('email');
		 		 $table->string('password', 60);

		 		 $table->timestamps();

		 });

		 Schema::create('tasks', function(Blueprint $table){
		 		$table->increments('id');

		 		$table->string('name');
		 		$table->boolean('status');
		 		$table->integer('user_id')->unsigned();
		 		
		 		$table->timestamps();

		 		$table->index('user_id');
		 }); 

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		  Schema::dropIfExists('users');
		  Schema::dropIfExists('users');
	}

}
