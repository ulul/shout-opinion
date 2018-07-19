<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('id');
        return view('home', compact('posts'));
    }

    public function privacyPolicy()
    {
        echo "Privacy Policy";
    }

    public function about()
    {
        echo "About us";
    }

    public function disclaimer()
    {
        echo "disclaimer";
    }
}
