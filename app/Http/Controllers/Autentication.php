<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class Autentication extends Controller
{
	public function register(Request $request)
    {
    	$user = new User();
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password=Hash::make($request->input('password'));
    	$user->profile_id=1;
    	$user->remember_token=null;
    	$user->save();
    	return view("index");
    }
}
