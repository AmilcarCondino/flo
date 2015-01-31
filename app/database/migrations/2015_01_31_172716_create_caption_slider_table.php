<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaptionSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('caption_slider', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('caption_id')->unsigned()->index();
			$table->foreign('caption_id')->references('id')->on('captions')->onDelete('cascade');
			$table->integer('slider_id')->unsigned()->index();
			$table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
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
		Schema::drop('caption_slider');
	}

}
