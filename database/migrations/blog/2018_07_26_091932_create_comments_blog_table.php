<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_blog', function (Blueprint $table) {
            $table->increments('comment_id')->comment('评论ID');
            $table->integer('post_id', false, true)->default(0)->comment('文章ID');
            $table->text('content')->comment('评论正文md');
            $table->integer('parent_id', false, true)->default(0)->comment('父评论ID');
            $table->string('nick_name', 50)->default('')->comment('评论者昵称');
            $table->string('email', 50)->default('')->comment('评论者email');
            $table->string('site', 50)->default('')->comment('评论者url');
            $table->tinyInteger('status', false, true)->default(0)->comment('状态 软删除');
            $table->integer('created_at')->unsigned()->default(0);
            $table->integer('updated_at')->unsigned()->default(0);

            $table->index('post_id');
            $table->index('parent_id');
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
        Schema::dropIfExists('comments_blog');
    }
}
