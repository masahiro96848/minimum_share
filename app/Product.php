<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'review', 'price', 'url', 'photo'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
