<?php

namespace App\Http\Controllers;

use App\Models\FreeComment;
use Illuminate\Http\Request;

class FreeCommentController extends Controller
{
    public function getBoardName()
    {
        $getBoard= explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
        return $name;
    }

    public function store(Request $request, $id)
    {
        $boardName = $this->getBoardName();
        $validation = $request->validate([
           'story' => 'required'
        ]);

        $cmt = new FreeComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->board_id = $id;
        $cmt->board_name = $boardName;
        $cmt->story = $validation['story'];
        $cmt->save();
        $cmt->comment_id = $cmt->id;
        $cmt->save();

        return redirect()->route('frees.show', $id);
    }

    public function update(Request $request, $id, $cmtId)
    {
        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = FreeComment::where('id', $cmtId)->first();
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('frees.show', $id);
    }

    public function destroy($id, $cmtId)
    {
        $cmt = FreeComment::where('id', $cmtId)->first();
        $cmt->status = 'delete';
        $cmt->save();

        return redirect()->route('frees.show', $id);
    }

    public function replyStore($id, $cmtId)
    {
        $boardName = $this->getBoardName();

        $validation = request()->validate([
           'story' => 'required'
        ]);

        $cmt = new FreeComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->board_id = $id;
        $cmt->board_name = $boardName;
        $cmt->comment_id = request()->input('comment_id');
        $cmt->class = 1;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('frees.show', $id);
    }
}
