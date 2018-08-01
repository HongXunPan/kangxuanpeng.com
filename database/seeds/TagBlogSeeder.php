<?php

use Illuminate\Database\Seeder;

class TagBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags_blog')->delete();

        for ($c = 1; $c <= 5; $c++) {
            App\TagBlog::create([
                'tag_name' => 'tagname' . $c,
            ]);
        }
    }
}
