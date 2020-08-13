<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

class Tag extends Model
{
    //permits to mass assign the field name in db
    protected $fillable = ['name'];

    // define ralationship with post table
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
