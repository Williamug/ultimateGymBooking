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
				'currency_id'             => 2,
				'company_name'            => 'Ultimate Fitness Kampala',
				'address'                 => 'Plot 3 Industrial area, Design Hub Kampala',
				'phone_number'            => '122344566',
				'official_company_number' => '0122347877',
				'email'                   => 'ultimategymbooking@gmail.com',
				'company_website'         => 'ultimate.com',
				'logo'                    => 'logo/default.png',
				'created_at'              => now(),
				'updated_at'              => now(),
			]);
	}
}
