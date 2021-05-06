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


    public function changePasswordPage()
    {
        return view('auth.change-password');
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
        return view('auth.destroy-page');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function findPwPage()
    {
        return view('auth.find-user-password');
    }

    public function userInfo()
    {

        return view('auth.user-info');
    }

    public function userConfirmPage()
    {
        return view('auth.user-confirm');
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
        return view('auth.user-post', compact('posts'));
    }

    public function userComment($id)
    {
        $mbtis = DB::table('mbti_comments')->select('user_id', 'board_id', 'board_name', 'story', 'created_at')->where('user_id', $id);
        $cmts = DB::table('free_comments')->select('user_id', 'board_id', 'board_name', 'story', 'created_at')->where('user_id', $id)
            ->unionAll($mbtis)->orderByDesc('created_at')->paginate(5);

        return view('auth.user-comment', compact('cmts'));
    }
}
