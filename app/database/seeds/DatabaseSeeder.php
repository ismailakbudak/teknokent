<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// call our class and run our seeds
		$this->call('AdminsAppSeeder');
		$this->command->info('Admins app seeds finished.'); // show information in the command line after everything is run
	}
}

// our own seeder class
// usually this would be its own file
class AdminsAppSeeder extends Seeder {
	
	public function run() {
 

		// seed our admins table -----------------------
		// we'll create three different admins

		// admin 1 is named Lawly. She is extremely dangerous. 
		$bearLawly = Admin::create(array(
			'username' => 'Lawly1',
 			'name'     => 'Lawly1',
			'surname'  => 'Lawly1',
			'email'    => 'isoakbudak@gmail.com',
		));

		// admin 2 is named Lawly. She is extremely dangerous. 
		$bearLawly = Admin::create(array(
			'username' => 'Lawly2',
 			'name'     => 'Lawly2',
			'surname'  => 'Lawly2',
			'email'    => 'isoakbudak2@gmail.com',
		));

		// admin 3 is named Lawly. She is extremely dangerous. 
		$bearLawly = Admin::create(array(
			'username' => 'Lawly3',
 			'name'     => 'Lawly3',
			'surname'  => 'Lawly3',
			'email'    => 'isoakbudak3@gmail.com',
		));


		$this->command->info('The admins are alive!');


	}

}
