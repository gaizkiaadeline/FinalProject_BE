<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }
    
    public function showLogin(){
        return view('auth.login');
    }

    function processLogin(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:12|',
        ]);
        
        $credentials = $request->only(['email', 'password']);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login')->with('error_status', 'Login Failed.');
    }

    function processRegister(Request $request){

        // if($_POST([]))

        $request->validate([
            'fullname' => 'required|string|min:3|max:40',
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|string|min:6|max:12|confirmed',
            'phone_number' => 'required|string|unique:users',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number, 
        ]);

        // $credentials = $request->validate([
        //     'fullname' => 'required|string|min:3',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|string|min:6|max:12|confirmed',
        //     'phone_number' => 'required|string|unique:users',
        // ]);

        // User::create($credentials);

        return redirect('/login')->with('success_status', 'Account successfully created. Please login to continue.');
    }

    function processLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success_status', 'Logout Successfully');

    }


}
