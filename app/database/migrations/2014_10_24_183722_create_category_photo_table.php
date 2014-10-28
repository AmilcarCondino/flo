<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_photo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('photo_id')->unsigned()->index();
			$table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
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
		Schema::drop('category_photo');
	}

}
