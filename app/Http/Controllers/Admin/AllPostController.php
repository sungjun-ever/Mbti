<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Free;
use App\Models\Mbti;
use App\Models\Temp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllPostController extends Controller
{
    public function index()
    {
        $mbtiGroup = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
            'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];
        $mbtis = Mbti::whereNull('moved');
        $all = Free::whereNull('moved')->unionAll($mbtis)->orderByDesc('created_at')->paginate(20, ['*'], 'posts');

        return view('admin.all-post', compact(['all', 'mbtiGroup']));
    }

    public function moveToTemp($boardName, $id)
    {
        $mbtiGroup = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
            'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];

        $temp = new Temp();
        $temp->board_name = $boardName;
        $temp->user_id = request()->input('user_id');
        $temp->title = request()->input('title');
        $temp->story = request()->input('story');
        $temp->save();

        if(in_array($boardName, $mbtiGroup)){
            $post = Mbti::where('id', $id)->first();
            $post->moved = 'move';
            $post->save();
        } elseif($boardName == 'frees'){
            $post = Free::where('id', $id)->first();
            $post->moved = 'move';
            $post->save();
        }

        return redirect()->route('temp.show', $temp->id);
    }
}
