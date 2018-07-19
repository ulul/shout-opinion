<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * list all posts
     * @return void
     */
    public function index()
    {
    	$posts = Post::all()->sortByDesc('id');
    	
    }

    /**
     * form to create post
     * @return void
     */
    public function create()
    {

    }

    /**
     * store post from form
     * @return void
     */
    public function store()
    {

    }

    /**
     * detail of post
     * @param  [String] $slug 
     * @return void
     */
    public function detail($slug)
    {
    	$post = Post::where('slug', '=', $slug)->firstOrFail();
    	return view('posts.detail', compact('post'));
    }
}
