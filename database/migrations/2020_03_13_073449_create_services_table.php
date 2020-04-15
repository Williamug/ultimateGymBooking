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
				$table->UnsignedBigInteger('currencies_id');
				$table->string('title');
				$table->string('service_duration');
				$table->integer('available_seats');
				$table->text('description');
				$table->time('service_starts_at');
				$table->time('service_ends_at');
				$table->integer('allow_booking_max_days_ago');
				$table->string('service_duration_type');
				$table->boolean('status');
				$table->string('days');
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
