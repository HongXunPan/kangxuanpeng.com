<?php

use Illuminate\Database\Seeder;

class CommentBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments_blog')->delete();

        for ($p = 1; $p <= 30; $p++) {
            for ($c = 1; $c <= 10; $c++) {
                App\CommentBlog::create([
                    'post_id' => $p,
                    'content' => 'comment' . $c . 'good for' .$p,
                    'parent_id' => 0,
                    'nick_name' => 'nickname' . $c,
                    'email' => str_random(6) . '@163.com',
                ]);
            }
        }
    }
}
