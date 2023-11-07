<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register_page(){
        return view('auth.register');
    }
  
    public function registerpost_page(Request $request){

        $request -> validate([
        'name'=> 'required',
        'email' => 'required | email | unique:users',
        'password' => 'required | confirmed'

        ]);  

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user);

        return redirect('/admin');
    }

    public function login_page(){
        return view('auth.login');
    }

    public function loginpost_page(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            $user = User::where('email', $credentials['email'])->first();
            Auth::login($user);
            return redirect('/admin');
        } else {
            return back()->withErrors(['Invalid Credentials!!']);
        }
    }
    
    public function logout_page(){
        Auth::logout();
        return redirect('/login');
    }
    }