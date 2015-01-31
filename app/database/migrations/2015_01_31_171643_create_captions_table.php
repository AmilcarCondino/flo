<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('captions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('caption_body');
            $table->boolean('is_photo');
            $table->string('data_animate');
            $table->integer('data_delay');
            $table->integer('data_length');
            $table->integer('top_position');
            $table->integer('left_position');
            $table->integer('transition_distance');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('captions');
	}

}
