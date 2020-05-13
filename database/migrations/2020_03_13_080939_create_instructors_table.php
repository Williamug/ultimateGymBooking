<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('instructors', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('user_id')->nullable();
				$table->string('phone_number')->nullable();
				$table->string('mobile_number')->nullable();
				$table->string('gender')->nullable();
				$table->date('dob')->nullable();
				$table->string('profile_image')->nullable();
				$table->boolean('verified')->nullable();
				$table->unsignedBigInteger('roles_id')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('instructors');
	}
}
