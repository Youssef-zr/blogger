<?php

use App\Post;
use Illuminate\Database\Seeder;

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

            ['title' => 'android 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","author_id"=>1, 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'iphone 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","author_id"=>1, 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'samsung 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","author_id"=>2, 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'huawei 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","author_id"=>3, 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
            ['title' => 'lg 2021', 'slug' => "android_news", 'summary' => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.","author_id"=>2, 'meta_title' => "the android news", 'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quos impedit beatae obcaecati quibusdam vitae eius quisquam aspernatur deserunt possimus! Velit animi quaerat cumque distinctio laborum accusantium temporibus minima ipsa.", 'published' => 0],
        ];

        foreach ($posts as $post) {
            $new = new Post();
            $new->fill($post)->save();
        }
    }
}
