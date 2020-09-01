<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['id', 'name'];

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
