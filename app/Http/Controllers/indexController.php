<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index ()
    {
        return view('index');
    }
    public function register ()
    {
        return view('register');
    }
    public function registerprocess (Request $request)
    {
       $this->validate($request, [
           'username' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required',
       ]);

           $new = new User;
           $new->username = $request->username;
           $new->email = strtolower($request->email);
           $new->password = bcrypt($request->password);
           $new->save();
       
           return redirect()->route('login');
    }
    public function login ()
    {
        return view('login');
    }
    public function loginprocess (Request $request)
     {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->route('index');
        }
            return redirect()->back();

    }
}
