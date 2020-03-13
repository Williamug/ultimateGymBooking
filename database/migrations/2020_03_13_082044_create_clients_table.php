<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('clients', function (Blueprint $table) {
				$table->id();
				$table->string('first_name');
				$table->string('last_name');
				$table->string('gender');
				$table->integer('phone_number');
				$table->date('dob');
				$table->string('profile_image');
				$table->boolean('verified');
				$table->unsignedInteger('users_id');
				$table->unsignedInteger('roles_id');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('clients');
	}
}
