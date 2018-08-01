<?php

use Illuminate\Database\Seeder;

class PostTagRelationBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tag_relations_blog')->delete();

        for ($p = 1; $p <= 30; $p++) {
            for ($t = 1; $t <= 5; $t++) {
                if (random_int(1, 5) == 3)
                    continue;
                App\PostTagRelationBlog::create([
                    'post_id' => $p,
                    'tag_id' => $t,
                ]);
            }
        }
    }
}
