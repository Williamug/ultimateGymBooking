<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('settings', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('currency_id');
				$table->string('company_name');
				$table->text('address');
				$table->string('phone_number')->nullable();
				$table->string('official_company_number');
				$table->string('email')->nullable();
				$table->string('website')->nullable();
				$table->string('logo')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('settings');
	}
}
