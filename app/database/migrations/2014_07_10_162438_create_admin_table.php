<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       		Schema::create('admins', function($table)
            {
                $table->engine = 'InnoDB';
                	 
                $table->increments('id');
                $table->string('email', 100)->nullable();
                $table->string('username', 50 )->unique()->nullable();
                $table->string('password', 65 )->nullable();
                $table->string('name', 50 )->nullable();
                $table->string('surname', 50 )->nullable();
                $table->rememberToken();
                $table->timestamps();
 
            });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}
