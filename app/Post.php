<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'category_id', 'slug', 'img'];

    public function category() {
        return $this -> belongsTo('App\Category');
    }

    public function tags() {
        return $this -> belongsToMany('App\Tag');
    }
}
