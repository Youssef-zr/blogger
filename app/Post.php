<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table="Posts";
   protected $guarded=[];

   /**
    * Get all of the categories for the Post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function categories()
   {
       return $this->belongsToMany(Category::class,'category_post', 'post_id', 'category_id');
   }

   /**
    * Get the user associated with the Post
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function user(): HasOne
   {
       return $this->hasOne(User::class, 'id', 'author_id');
   }

}
