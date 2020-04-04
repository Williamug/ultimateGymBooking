<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('settings')->insert([
				'company_name'            => 'Ultimate Gym Booking',
				'address'                 => 'Plot 3 Industrial area, Design Hub Kampala',
				'phone_number'            => '122344566',
				'fax_number'              => '122347877',
				'official_company_number' => '0122347877',
				'email'                   => 'ultimategymbooking@gmail.com',
				'logo'                    => 'logo.jpg',
				'logo'                    => 'logo.jpg',
				'timezone'                => 'Africa/Nairobi',
				'created_at'              => now(),
				'updated_at'              => now(),
			]);
	}
}
