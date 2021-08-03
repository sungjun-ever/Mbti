<?php

namespace App\Http\Controllers\Mbti;

use App\Models\MbtiComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MbtiCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mbtisName()
    {
        $mbtiSort = explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z!@#$%^&*=_A-Z0-9]*/', '', $mbtiSort[1]);
        return $name;
    }

    public function store(Request $request, $id)
    {

        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = new MbtiComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->user_name = auth()->user()->name;
        $cmt->board_id = $id;
        $cmt->board_name = $mbtiName;
        $cmt->story = $validation['story'];
        $cmt->save();
        $cmt->comment_id = $cmt->id;
        $cmt->save();
        return redirect()->route($mbtiName.'.show', $id);
    }

    public function update($id, $cmtId)
    {
        $validation = request()->validate([
           'story' => 'required'
        ]);
        $cmt = MbtiComment::where('id', $cmtId)->first();
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route($cmt->mbti->mbtiSort.'.show', $id);
    }

    public function destroy($id, $cmtId)
    {
        $mbtiName = $this->mbtisName();
        $cmt = MbtiComment::where('id', $cmtId)->first();
        $cmt->status = 'delete';
        $cmt->save();
        return redirect()->route($mbtiName.'.show', $id);
    }

    public function replyStore(Request $request, $id)
    {
        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = new MbtiComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->user_name = auth()->user()->name;
        $cmt->board_id = $id;
        $cmt->board_name = $mbtiName;
        $cmt->comment_id = request()->input('comment_id');
        $cmt->class = 1;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route($mbtiName.'.show', $id);
    }
}
