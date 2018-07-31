<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_blog', function (Blueprint $table) {
            $table->increments('post_id')->comment('文章ID');
            $table->string('post_name', 200)->default('')->comment('文章标题');
            $table->string('slug', 100)->default('')->comment('文章slug');
            $table->text('content')->comment('正文md');
            $table->integer('author_id', false, true)->default(0)->comment('作者ID');
            $table->integer('comment_num', false, true)->default(0)->comment('评论数 (冗余)');
            $table->tinyInteger('status', false, true)->default(0)->comment('状态 发布or草稿');
            $table->integer('created_at')->unsigned()->default(0);
            $table->integer('updated_at')->unsigned()->default(0);

            $table->index('post_name');
            $table->index('slug');
            $table->index('author_id');
            $table->index('comment_num');
            $table->index('status');
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_blog');
    }
}
