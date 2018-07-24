<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.home');
    }

    /**
     * [manageUser description]
     * @return [void] 
     */
    public function manageUser()
    {
        $users = User::withTrashed()
                        ->orderBy('id', 'DESC')
                        ->paginate(15);

        return view('admins.manage-user', compact('users'));
    }

    /**
     * [deleteUser description]
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function deleteUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        //$user->softDeletes();

        return redirect()->route('admin.manage.user')->with([
            'message' => 'User has been deleted'
        ]);
    }

    /**
     * [activateUser description]
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function activateUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        dd($user);
    }

    /**
     * [manageOpinion description]
     * @return [void] \
     */
    public function manageOpinion()
    {
        $posts = Post::with('user')->paginate(6);
        return view('admins.manage-opinion', compact('posts'));
    }
}
