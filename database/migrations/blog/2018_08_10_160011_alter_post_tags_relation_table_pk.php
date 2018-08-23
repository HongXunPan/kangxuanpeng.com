<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostTagsRelationTablePk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag_relations_blog', function (Blueprint $table) {
            $table->increments('id')->comment('ID')->first();

            $table->index('post_id');
            $table->index('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tag_relations_blog', function (Blueprint $table) {
            $table->dropIndex('post_tag_relations_blog_post_id_index');
            $table->dropIndex('post_tag_relations_blog_tag_id_index');
            $table->dropColumn('id');
        });
    }
}
