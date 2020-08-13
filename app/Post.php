<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

use App\Tag;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = [
        'published_at'
    ];

    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id', 'user_id'
    ];

    /* 
    Delete Post Image from storage
        @return void
    */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    /* 
    check if a post has a tag
    *
    @return bool
    *
    */

    public function hasTag($tagId)
    {
        // return only an array of ids from the collection
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    //defining a relationship for user and post
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //creating scope for published

    public function scopePublished($query)
    {

        ///now returns the current date
        return $query->where('published_at', '<=', now());
    }

    //creating a laravel scope
    public function scopeSearched($query)
    {
        $search = request()->query('search');


        //if no search dont modify just return query
        if (!$search) {
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }
}
