<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title'=>"أخبار","meta_tag"=>"News","slug"=>"smart_phone"],
            ['title'=>"سياسة","meta_tag"=>"Policy","slug"=>"trinding_movies"],
            ['title'=>"اقتصاد","meta_tag"=>"Economy","slug"=>"programming"],
            ['title'=>"مجتمع","meta_tag"=>"Community","slug"=>"programming"],
            ['title'=>"تربية وتعليم","meta_tag"=>"education","slug"=>"programming"],
            ['title'=>"رياضة","meta_tag"=>"Sport","slug"=>"programming"],
        ];

        foreach ($categories as $category) {
           $new = new Category();
           $new->fill($category)->save();
        }
    }
}
