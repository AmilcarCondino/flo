<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFiledsOfSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sliders', function(Blueprint $table)
		{
			$table->dropColumn('headline');
            $table->dropColumn('paragraph');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sliders', function(Blueprint $table)
		{
			//
		});
	}

}
