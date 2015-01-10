<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->text('body')->nullable();
			$table->text('header')->nullable();
			$table->string('direct_url')->nullable();
			$table->integer('sortindex')->default(0);
			$table->integer('parent_id')->default(0);
			$table->integer('language_id')->default(0);
			$table->integer('contact_id')->default(0);
			$table->text('meta')->nullable();
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
		Schema::drop('pages');
	}

}
