<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPostTagsRelationTablePk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag_relations_blog', function (Blueprint $table) {
            $table->dropPrimary(['post_id', 'tag_id']);
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
            $table->primary(['post_id', 'tag_id']);
        });
    }
}
