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
        $cmt->user_name = auth()->user()->name;
        $cmt->mbti_id = $id;
        $cmt->mbti_name = $mbtiName;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentDestroy(Request $request, $id)
    {
        $mbtiName = $this->mbtisName();
        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentReplyStore($id)
    {
        $cmt = Comment::where('mbti_id', $id);
    }
}
