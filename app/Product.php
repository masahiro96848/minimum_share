<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'review', 'photo', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function likeProducts()
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user)
    {
        return $user
        ?(bool)$this->likeProducts->where('id', $user->id)->count()
        : false;
    }

    public function getCountLikesAttribute()
    {
        return $this->likeProducts->count();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimeStamps();
    }

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
}
