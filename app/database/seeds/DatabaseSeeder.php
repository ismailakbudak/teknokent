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

	    $root = Admin::create(array(
					'username' => 'root',
		 			'name'     => 'root',
					'surname'  => 'root',
					'email'    => 'root@gmail.com',
					'password' => Hash::make('1234'),
		));
    

		// is there a any record ?
		if ( isset($admin) ) 
	   	    $i = $admin->id;
		else  
			 $i = 0;
		
		$this->command->info('The last inserted id' . $i);
        $count = $i + 100;
        for ($i; $i <  $count; $i++) { 
            // admin 3 is named Lawly. She is extremely dangerous. 
		    $bearLawly = Admin::create(array(
					'username' => 'iso'.$i,
		 			'name'     => 'ismail'.$i,
					'surname'  => 'AKBUDAK'.$i,
					'email'    => 'isoakbudak'.$i.'@gmail.com',
					'password' => Hash::make('1234'),
		   ));
        }
		


		$this->command->info('The admins are alive!');


	}

}
