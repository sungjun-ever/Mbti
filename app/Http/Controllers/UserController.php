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
            'email' => 'required|email:rfc,dns',
            'name' => 'required|between:3,5',
            'password' => 'required|confirmed|between:8, 12'
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

    public function destroyPage(){

        return view('auth.destroyPage');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

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

        $value = $validation['password'];

        if(Hash::check($value, auth()->user()->password)) {
            if($_REQUEST['mid'] == 'change'){
                return redirect()->route('changePasswordPage', $id);
            } elseif($_REQUEST['mid'] == 'delete'){
                return redirect()->route('destroyPage', $id);
            }
        } else {
            return redirect()->back()->with('fail', '비밀번호가 일치하지 않습니다.');
        }
    }

    public function userPost($id)
    {
        $mbtis = DB::table('mbtis')->select('id', 'user_id', 'board_name', 'title', 'created_at')->where('user_id', $id);
        $posts = DB::table('frees')->select('id', 'user_id', 'board_name', 'title', 'created_at')->where('user_id', $id)
                ->unionAll($mbtis)->orderByDesc('created_at')->paginate(5);
        return view('auth.userPost', compact('posts'));
    }

    public function userComment($id)
    {
        $mbtis = DB::table('mbti_comments')->select('user_id', 'board_id', 'board_name', 'story', 'created_at')->where('user_id', $id);
        $cmts = DB::table('free_comments')->select('user_id', 'board_id', 'board_name', 'story', 'created_at')->where('user_id', $id)
            ->unionAll($mbtis)->orderByDesc('created_at')->paginate(5);

        return view('auth.userComment', compact('cmts'));
    }
}
