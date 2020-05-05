<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('services', function (Blueprint $table) {
				$table->id();
				$table->integer('price');
				$table->string('title')->unique();
				// $table->string('service_duration');
				$table->integer('available_seats')->nullable();
				$table->text('description')->nullable();
				$table->time('service_starts_at')->nullable();
				$table->time('service_ends_at')->nullable();
				$table->integer('allow_booking_max_days_ago')->nullable();
				$table->boolean('service_duration_type')->nullable();
				$table->boolean('status')->nullable();
				$table->string('days')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('services');
	}
}
