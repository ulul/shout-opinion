<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

    /**
     * [post_detail description]
     * @param  [String] $slug [description]
     * @return void
     */
    public function profile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user_posts = Post::where('user_id', $user->id)->get();

        return view('users.profile', compact('user', 'user_posts'));
    }
}
