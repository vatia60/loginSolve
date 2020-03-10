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

           $data = [
               'username' => $request->input('username'),
               'email' => strtolower($request->input('email')),
               'password' =>bcrypt($request->input('password')),
           ];

           User::create($data);

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
