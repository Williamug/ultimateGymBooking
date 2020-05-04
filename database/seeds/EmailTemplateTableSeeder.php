<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('email_templates')->insert([
				'title'      => 'Booking Confirmation',
				'message'    => '',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('email_templates')->insert([
				'title'      => 'Booking Received',
				'message'    => 'Super Admin',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('email_templates')->insert([
				'title'      => 'Booking Rejected',
				'message'    => '',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('email_templates')->insert([
				'title'      => 'Reset Password',
				'message'    => '',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('email_templates')->insert([
				'title'      => 'User Registration',
				'message'    => '',
				'created_at' => now(),
				'updated_at' => now(),
			]);
	}
}
