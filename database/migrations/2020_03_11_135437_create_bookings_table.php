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
				$table->date('booking_date')->nullable();
				$table->time('booking_time')->nullable();
				$table->integer('quantity')->nullable();
				$table->text('comment')->nullable();
				$table->string('status')->nullable();
				$table->unsignedBigInteger('payment_id')->nullable();
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
