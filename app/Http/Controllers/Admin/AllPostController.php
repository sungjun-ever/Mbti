<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Func\GetBoardName;
use App\Models\Anonymous;
use App\Models\Free;
use App\Models\Mbti;
use App\Models\Suggest;
use App\Models\Temp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllPostController extends Controller
{
    public function index()
    {
        $mbtiGroup = GetBoardName::$mbtiBoard;
        $mbtis = Mbti::whereNotNull('board_name');
        $all = Free::whereNotNull('board_name')->unionAll($mbtis)->orderByDesc('board_name')->paginate(20, ['*'], 'posts');

        return view('admin.all-post', compact(['all', 'mbtiGroup']));
    }

    public function moveToTemp($boardName, $id)
    {
        $mbtiGroup = GetBoardName::$mbtiBoard;

        $temp = new Temp();
        $temp->board_name = $boardName;
        $temp->board_id = $id;
        $temp->user_id = request()->input('user_id');
        $temp->user_name = request()->input('user_name');
        $temp->title = request()->input('title');
        $temp->story = request()->input('story');
        $temp->save();

        if(in_array($boardName, $mbtiGroup)){
            $post = Mbti::where('id', $id)->first();
            $post->moved = 'move';
            $post->save();
        }

        if($boardName == 'frees'){
            $post = Free::where('id', $id)->first();
            $post->moved = 'move';
            $post->save();
        }

        return redirect()->route('temp.show', $temp->id);
    }

    public function restore($boardName, $id)
    {
        $mbtiGroup = GetBoardName::$mbtiBoard;

        $temp = Temp::where('board_name', $boardName)->where('board_id', $id)->first();
        $temp->delete();

        if(in_array($boardName, $mbtiGroup)){
            $post = Mbti::where('id', $id)->first();
            $post->moved = 'not';
            $post->save();
        }

        if($boardName == 'frees'){
            $post = Free::where('id', $id)->first();
            $post->moved = 'not';
            $post->save();
        }

        if($boardName == 'suggests'){
            $post = Suggest::where('id', $id)->first();
            $post->moved = 'not';
            $post->save();
        }

        if($boardName == 'anonymous'){
            $post = Anonymous::where('id', $id)->first();
            $post->moved = 'not';
            $post->save();
        }

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $mbtiGroup = GetBoardName::$mbtiBoard;

        $content = $request->input('content');
        $search = $request->input('search');

        $mbtis = Mbti::where($content, 'LIKE', "%{$search}%");
        $frees = Free::where($content, 'LIKE', "%{$search}%")->unionAll($mbtis);
        $all = Anonymous::where($content, 'LIKE', "%{$search}%")->unionAll($frees)->orderByDesc('created_at')->paginate
        (20);

        return view('admin.post-search', compact(['all', 'mbtiGroup', 'content', 'search']));
    }
}
