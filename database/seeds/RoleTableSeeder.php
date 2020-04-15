<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('roles')->insert([
				'role'       => 'Super Admin',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('roles')->insert([
				'role'       => 'Admin',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('roles')->insert([
				'role'       => 'Accountant',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('roles')->insert([
				'role'       => 'Instructor',
				'created_at' => now(),
				'updated_at' => now(),
			]);
		DB::table('roles')->insert([
				'role'       => 'Client',
				'created_at' => now(),
				'updated_at' => now(),
			]);
	}
}
