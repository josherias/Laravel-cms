<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //permits to mass assign the field name in db
    protected $fillable = ['name'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
