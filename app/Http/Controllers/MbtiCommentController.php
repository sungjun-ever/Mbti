<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class MbtiCommentController extends Controller
{
    public function mbtisName()
    {
        $mbtiSort = explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z!@#$%^&*=_A-Z0-9]*/', '', $mbtiSort[2]);
        return $name;
    }

    public function commentStore(Request $request, $id)
    {

        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = new Comment();
        $cmt->user_id = auth()->user()->id;
        $cmt->mbti_id = $id;
        $cmt->story = $validation['story'];
        $cmt->save();
        $cmt->comment_id = $cmt->id;
        $cmt->save();
        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentUpdate($cmtId)
    {
        $validation = request()->validate([
           'story' => 'required'
        ]);
        $cmt = Comment::where('id', $cmtId)->first();
        $cmt->story = $validation['required'];
        $cmt->save();

        return redirect()->route('mbtis.'.$cmt->mbti->mbtiSort.'.show', $cmt->mbti->id);
    }

    public function commentDestroy($id, $cmtId)
    {
        $mbtiName = $this->mbtisName();
        $cmt = Comment::where('id', $cmtId)->first();
        $cmt->story = '[삭제된 댓글입니다.]';
        $cmt->status = 'delete';
        $cmt->save();
        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentReplyStore(Request $request, $id, $cmtId)
    {
        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
            'story' => 'required'
        ]);

        $parent = Comment::select('comment_id', 'class')->where('id', $cmtId)->first();

        $cmt = new Comment();
        $cmt->user_id = auth()->user()->id;
        $cmt->mbti_id = $id;
        $cmt->comment_id = $parent->comment_id;
        $cmt->class = $parent->class + 1;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }
}
