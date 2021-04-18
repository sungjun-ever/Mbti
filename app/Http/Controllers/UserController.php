<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validation = $request->validate(
            [
            'email' => 'required',
            'name' => 'required|max:5',
            'password' => 'required|between:12,8|confirmed'
            ]);

        $user = new User();
        $user->email = $validation['email'];
        $user->name = $validation['name'];
        $user->password = Hash::make($validation['password']);
        $user->save();

        return redirect()->route('home');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $valiadtion = $request->validate([
            'email' => 'required',
            'password' => 'required|digits_between:8,12'
        ]);
        $remember = $request->remember_me;
        if (Auth::attempt($valiadtion, $remember)){
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
