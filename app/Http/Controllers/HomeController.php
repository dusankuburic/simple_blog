<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function  numberOfPosts(){
        $posts = Post::all();
        $countedPosts = count($posts);

        return $countedPosts;
    }

    public function numberOfCategories(){
        $categories = Category::all();
        $countedCategories = count($categories);

        return $countedCategories;
    }

    public function numberOfTags(){
        $tags = Tag::all();
        $countedTags = count($tags);

        return $countedTags;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countedPosts = $this->numberOfPosts();
        $countedCategories = $this->numberOfCategories();
        $countedTags = $this->numberOfTags();

        return view('home')
            ->with('countedPosts', $countedPosts)
            ->with('countedCategories', $countedCategories)
            ->with('countedTags', $countedTags);
    }


}
