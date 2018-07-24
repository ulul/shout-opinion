<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popular_posts = Post::with('user')->orderBy('page_views', 'DESC')
                            ->paginate(6);
        $posts = Post::with('user')->orderBy('id', 'DESC')
                            ->paginate(10);

        return view('home', compact('posts', 'popular_posts'));
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
