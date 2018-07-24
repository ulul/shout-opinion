<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);
    }

    /**
     * [post_detail description]
     * @param  [String] $slug [description]
     * @return void
     */
    public function profile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user_posts = Post::with('user')
                            ->where('user_id', $user->id)
                            ->orderBy('id', 'DESC')
                            ->paginate(15);
        
        return view('users.profile', compact('user', 'user_posts'));
    }

    /**
     * [edit description]
     * @param  [String] $username 
     * @return void
     */
    public function formEditUser($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::where('id', $id)->firstOrFail();
        
        if ($request->avatar) {
            $validation = [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255,',
                            Rule::unique('users')->ignore($id),
                'email' => 'required|string|email|max:255,',
                            Rule::unique('users')->ignore($id),
                'gender' => 'required|string|max:255',
                'avatar' => 'image',
            ];
        }else{
            $validation = [
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255,',
                            Rule::unique('users')->ignore($id),
                'email' => 'required|string|email|max:255,',
                            Rule::unique('users')->ignore($id),
                'gender' => 'required|string|max:255',
            ];
        }

        $this->validate($request, $validation);

        if ($request->avatar) {
            
            $uploadedFile = $request->file('avatar');        
            $path = $uploadedFile->store('public/files/avatar/');

            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $path,
            ];
        }else{
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ];
        }

        $user->update($data);

        return redirect()->route('user.profile', $request->username)->with([
            'message' => 'Profile has been updated.'
        ]);

    }
}
