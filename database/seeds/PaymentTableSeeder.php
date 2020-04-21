<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('payments')->insert([
				'payment_method' => 'Cash',
				'created_at'     => now(),
				'updated_at'     => now(),
			]);
		DB::table('payments')->insert([
				'payment_method' => 'Mobile Money',
				'created_at'     => now(),
				'updated_at'     => now(),
			]);
		DB::table('payments')->insert([
				'payment_method' => 'Visa',
				'created_at'     => now(),
				'updated_at'     => now(),
			]);
	}
}
