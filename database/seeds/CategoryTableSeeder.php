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
            ['title'=>"أخبار","meta_tag"=>"News","slug"=>"News"],
            ['title'=>"سياسة","meta_tag"=>"Policy","slug"=>"Policy"],
            ['title'=>"اقتصاد","meta_tag"=>"Economy","slug"=>"Economy"],
            ['title'=>"مجتمع","meta_tag"=>"Community","slug"=>"Community"],
            ['title'=>"تربية وتعليم","meta_tag"=>"education","slug"=>"Education"],
            ['title'=>"رياضة","meta_tag"=>"Sport","slug"=>"Sport"],
            ['title'=>"وظائف","meta_tag"=>"jobs","slug"=>"Jobs"]
        ];

        foreach ($categories as $category) {
           $new = new Category();
           $new->fill($category)->save();
        }
    }
}
