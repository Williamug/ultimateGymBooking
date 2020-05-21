<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		$this->call(SettingsTableSeeder::class );
		$this->call(CurrencyTableSeeder::class );
		$this->call(RoleTableSeeder::class );
		// $this->call(InstructorTableSeeder::class );
		$this->call(PaymentMethodsTableSeeder::class );
		$this->call(EmailSettingTableSeeder::class );
		$this->call(EmailTemplateTableSeeder::class );
	}
}
