<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup()
    {
    	return view('web.signup',['active'=>'login']);
    }

    public function postsignup(Request $request)
    {
    	$user = new \App\User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->remember_token = str_random(20);
        $user->level = "1";
    	$user->save();

    	return redirect('/login');
    }
}
