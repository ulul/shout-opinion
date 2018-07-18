<?php

namespace App\Http\Controllers;

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

    }
}
