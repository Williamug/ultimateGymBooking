<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('payment_methods')->insert([
				'payment_methods' => 'Cash',
				'created_at'      => now(),
				'updated_at'      => now(),
			]);
		DB::table('payment_methods')->insert([
				'payment_methods' => 'Mobile Money',
				'created_at'      => now(),
				'updated_at'      => now(),
			]);
		DB::table('payment_methods')->insert([
				'payment_methods' => 'Visa',
				'created_at'      => now(),
				'updated_at'      => now(),
			]);
	}
}
