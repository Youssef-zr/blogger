<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
   protected $table="Categories";
   protected $guarded=['createdAt'];

   /**
    * Get all of the posts for the category
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function posts()
   {
       return $this->belongsToMany(Post::class,'category_post', 'category_id', 'post_id');
   }

   public function getCreatedAtAttribute( $value)
   {
        Carbon::setlocale('ar');
        return \Carbon\Carbon::parse($value)->diffForHumans();
   }
}
