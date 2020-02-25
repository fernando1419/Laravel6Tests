<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tag', function (Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('article_id');
			$table->unsignedBigInteger('tag_id');
			$table->timestamp('activated_at')->nullable();
			$table->boolean('is_usefull')->nullable()->default(false);
			$table->timestamps();

			$table->unique(['article_id', 'tag_id']);

			$table->foreign('article_id')->references('id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('article_tag');
	}
}
