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
				$table->string('gender')->nullable();
				$table->string('phone_number')->nullable();
				$table->date('dob')->nullable();
				$table->string('profile_image')->nullable();
				$table->boolean('verified')->nullable();
				$table->unsignedBigInteger('user_id')->nullable();
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
