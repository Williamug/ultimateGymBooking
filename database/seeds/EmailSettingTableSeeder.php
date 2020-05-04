<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('email_settings')->insert([
				'email_sent_from_name' => 'Ultimate Gym',
				'email'                => 'ultimate@email.com',
				'created_at'           => now(),
				'updated_at'           => now(),
			]);
	}
}
