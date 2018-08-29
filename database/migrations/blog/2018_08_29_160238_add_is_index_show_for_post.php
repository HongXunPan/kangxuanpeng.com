<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsIndexShowForPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_blog', function (Blueprint $table) {
            $table->tinyInteger('is_index_show', false, true)->default(1)->comment('是否在首页显示，默认是');
            $table->index('is_index_show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts_blog', function (Blueprint $table) {
            $table->dropColumn('is_index_show');
        });
    }
}
