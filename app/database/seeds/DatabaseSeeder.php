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
    // call the cat breed seeder
    $this->call('BreedsTableSeeder');
		// $this->call('UserTableSeeder');
	}

}
