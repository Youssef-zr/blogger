<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
   protected $table="Posts";
   protected $guarded=['createdAt'];

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
   public function user()
   {
       return $this->hasOne(User::class,'id','author_id');
   }

   
   public function getCreatedAtAttribute( $value)
   {
        Carbon::setlocale('ar');
        return \Carbon\Carbon::parse($value)->diffForHumans();
   }

}
