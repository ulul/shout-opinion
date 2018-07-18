<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
    	return view('admins.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email|',
    		'password' => 'required|min:6',
		]);

		$credentials = [
			'email' => $request->email,
			'password' => $request->password,
		];

		if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
			return redirect()->intended(route('admin.home'));
		}

		return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect('/');
    }
}
