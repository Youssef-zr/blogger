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
            ['title'=>"phone","meta_tag"=>"the modern phones of the year","slug"=>"smart_phone"],
            ['title'=>"cinema","meta_tag"=>"the last trinding movies","slug"=>"trinding_movies"],
            ['title'=>"programming","meta_tag"=>"the best languesg of programming","slug"=>"programming"],
        ];

        foreach ($categories as $category) {
           $new = new Category();
           $new->fill($category)->save();
        }
    }
}
