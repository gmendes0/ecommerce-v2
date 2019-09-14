<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 255);
			$table->string('type', 30);
			$table->string('extension', 5);
			$table->string('path', 255);
			$table->unsignedBigInteger('produto_id');
			$table->foreign('produto_id')
						->references('id')
						->on('produtos')
						->onDelete('cascade');
			$table->softDeletes();
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
		Schema::dropIfExists('photos');
	}
}
