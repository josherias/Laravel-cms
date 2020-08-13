<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        //old format before scope
        // //check if search query exists in the url 
        // $search = request()->query('search');
        // if ($search) {
        //     //serch and paignate
        //     $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        // } else {
        //     //paginate
        //     $posts = Post::simplePaginate(3);
        // }


        return view('welcome')
            ->with('categories', Category::all())
            ->with('tags', Tag::all())
            ->with('posts', Post::searched()->simplePaginate(3)); //new format wi is cleaner of the custom scope
    }
}
