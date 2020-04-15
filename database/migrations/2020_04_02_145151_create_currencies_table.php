<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('currencies', function (Blueprint $table) {
				$table->id();
				// $table->unsignedInteger('settings_id');
				$table->string('currency', 45);
				$table->string('currency_symbol', 4);
				$table->string('currency_long_name');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('currencies');
	}
}
