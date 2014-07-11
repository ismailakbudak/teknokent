<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		    Schema::create('companies', function($table)
            {
            	$table->engine = 'InnoDB';

                $table->increments('id');
                $table->integer('admin_id')->nullable();
                $table->integer('department_id' )->nullable();
                $table->string('name', 100 )->nullable();
                $table->string('owner', 100 )->nullable();
                $table->string('phone', 15 )->nullable();
                $table->string('email', 150 )->nullable();
                $table->string('password', 50 )->nullable();
                $table->string('address', 200 )->nullable();
                $table->string('website', 200 )->nullable();
                $table->string('logo_path', 200 )->nullable();
                $table->tinyInteger('status' )->nullable(); 
                $table->timestamps(); 
 
                $table->index('admin_id');
                $table->index('department_id');
                /*
                $table->foreign('admin_id')->references('id')->on('admins');
                $table->foreign('department_id')->references('id')->on('departments');
                 */
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/*
		$table->dropForeign('admins_admin_id_foreign');
		$table->dropForeign('departments_department_id_foreign');
         */
		Schema::drop('companies');
	}

}
