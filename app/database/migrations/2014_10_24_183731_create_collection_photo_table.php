<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_photo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('collection_id')->unsigned()->index();
			$table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
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
		Schema::drop('collection_photo');
	}

}
