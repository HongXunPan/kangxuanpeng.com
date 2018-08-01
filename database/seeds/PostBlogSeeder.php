<?php

use Illuminate\Database\Seeder;

class PostBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_blog')->delete();

        for ($c = 1; $c <= 30; $c++) {
            App\PostBlog::create([
                'post_name' => 'postname' . $c,
                'slug' => 'slug' . $c,
                'content' => 'content' . $c,
                'author_id' => 1,
            ]);
        }
    }
}
