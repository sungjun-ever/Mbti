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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroyPage()
    {
        return view('auth.destroy-page');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function userInfo()
    {
        return view('auth.user-info');
    }

    public function userPost($id)
    {
        $mbtis = DB::table('mbtis')->select('id', 'user_id', 'board_name', 'title', 'created_at')->where('user_id', $id);
        $frees = DB::table('frees')->select('id', 'user_id', 'board_name', 'title', 'created_at')->where('user_id', $id)
                ->unionAll($mbtis);
        $posts = DB::table('anonymouses')->select('id', 'user_id', 'board_name', 'title', 'created_at')->where('user_id',
            $id)
            ->unionAll($frees)->orderByDesc('created_at')->paginate(5);

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
