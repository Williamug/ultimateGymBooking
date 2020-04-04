<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('currencies')->insert([
				'settings_id'        => 1,
				'currency'           => 'USD',
				'currency_symbol'    => '$',
				'currency_long_name' => 'United States Dollar',
				'created_at'         => now(),
				'updated_at'         => now(),
			]);

		DB::table('currencies')->insert([
				'settings_id'        => 1,
				'currency'           => 'UGX',
				'currency_symbol'    => '/=',
				'currency_long_name' => 'Ugandan Shillings',
				'created_at'         => now(),
				'updated_at'         => now(),
			]);
	}
}
