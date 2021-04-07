<?php

use App\Post;
use Illuminate\Database\Seeder;
use App\Category;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [

            ['title' => 'android 2021', 'slug' => "android", 'summary' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها","user"=>'youssef', 'meta_title' => "the android news", 'content' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها", 'published' => 0],
            ['title' => 'iphone 2021', 'slug' => "iphone", 'summary' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها","user"=>'youssef', 'meta_title' => "the android news", 'content' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها", 'published' => 0],
            ['title' => 'samsung 2021', 'slug' => "samsung", 'summary' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها","user"=>'youssef', 'meta_title' => "the android news", 'content' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها", 'published' => 0],
            ['title' => 'huawei 2021', 'slug' => "huawei", 'summary' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها","user"=>'youssef', 'meta_title' => "the android news", 'content' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها", 'published' => 0],
            ['title' => 'lg 2021', 'slug' => "lg", 'summary' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها","user"=>'youssef', 'meta_title' => "the android news", 'content' => "عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها", 'published' => 0],
        ];

        $cats = [1,2,3,4,5,6];

        foreach ($posts as $post) {

            $new = new Post();
            $new->fill($post)->save();

            $ids = [$cats[random_int(1,5)],$cats[random_int(1,5)],$cats[random_int(1,5)]];
            $new->categories()->sync($ids);
        }
    }
}
