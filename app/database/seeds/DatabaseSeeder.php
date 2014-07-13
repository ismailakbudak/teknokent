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
        $admin = Admin::orderby('id', 'desc')->first();
		
		$i = $admin->id;
		$this->command->info('The last inserted id' . $i);
        $count = $i + 100;
        for ($i; $i <  $count; $i++) { 
            // admin 3 is named Lawly. She is extremely dangerous. 
		    $bearLawly = Admin::create(array(
					'username' => 'Lawly'.$i,
		 			'name'     => 'Lawly'.$i,
					'surname'  => 'Lawly'.$i,
					'email'    => 'isoakbudak'.$i.'@gmail.com',
		   ));
        }
		


		$this->command->info('The admins are alive!');


	}

}
