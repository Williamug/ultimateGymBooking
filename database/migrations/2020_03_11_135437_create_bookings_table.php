<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('bookings', function (Blueprint $table) {
				$table->id();
				$table->string('phone_number');
				$table->date('booking_date');
				$table->time('booking_time');
				$table->integer('quality');
				$table->text('comment');
				$table->boolean('status');
				$table->unsignedBigInteger('payment_id');
				$table->unsignedBigInteger('currency_id');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('bookings');
	}
}
