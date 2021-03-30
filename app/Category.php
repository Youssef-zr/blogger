<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table="Categories";
   protected $guarded=[];

   /**
    * Get all of the posts for the category
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function posts(): HasMany
   {
       return $this->belongsToMany(Post::class,'category_post', 'category_id', 'post_id');
   }
}
