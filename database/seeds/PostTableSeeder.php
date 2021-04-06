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

            ['title' => 'android 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","user"=>'youssef', 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'iphone 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","user"=>'youssef', 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'samsung 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","user"=>'youssef', 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'huawei 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","user"=>'youssef', 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'lg 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","user"=>'youssef', 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
        ];

        $cats_ids = [1,2,3,4,5,6];
        
        foreach ($posts as $post) {

            $new = new Post();
            $new->fill($post)->save();

            $arr = array_rand($cats_ids,2);
            $new->categories()->sync($arr);
        }
    }
}
