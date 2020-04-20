<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('instructors')->insert([
				'first_name'    => 'William',
				'last_name'     => 'Asaba',
				'phone_number'  => '+256788379938',
				'mobile_number' => '+256788374558',
				'gender'        => 'Male',
				'dob'           => '1993/03/14',
				'profile_image' => 'profile.jpg',
				'verified'      => 1,
				'roles_id'      => 1,
				'created_at'    => now(),
				'updated_at'    => now(),
			]);
	}
}
