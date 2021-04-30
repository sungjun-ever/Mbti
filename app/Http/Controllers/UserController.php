<?php

namespace App\Http\Controllers;

use App\Models\Mbti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            'password' => 'required|confirmed'
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

    public function userInfo()
    {

        return view('auth.userInfo');
    }

    public function userConfirmPage()
    {
        return view('auth.userConfirm');
    }

    public function userConfirm(Request $request, $id)
    {
        $validation = $request->validate([
           'password'=>'required'
        ]);

        $value = $request->input('password');

        if(Hash::check($value, auth()->user()->password)) {
            return redirect()->route('changePasswordPage', $id);
        } else {
            return redirect()->back()->with('fail', '비밀번호가 일치하지 않습니다.');
        }
    }

    public function changePasswordPage()
    {
        return view('auth.changePassword');
    }

    public function changePassword(Request $request, $id)
    {
        $validation = $request->validate([
            'password'=> 'required|confirmed'
        ]);
        User::find($id)->update(['password'=>Hash::make($validation['password'])]);
        Auth::logout();

        return redirect()->route('home');
    }

    public function userPost($id)
    {
        $mbtis = DB::table('mbtis')->select('user_id', 'title', 'created_at')->where('user_id', $id);
        $posts = DB::table('frees')->select('user_id', 'title', 'created_at')->where('user_id', $id)
                ->unionAll($mbtis)->orderByDesc('created_at')->paginate(5);
        return view('auth.userPost', compact('posts'));
    }

    public function userComment()
    {

    }
}
