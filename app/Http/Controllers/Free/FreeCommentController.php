<?php

namespace App\Http\Controllers\Free;

use App\Models\FreeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $validation = $request->validate([
           'story' => 'required'
        ]);

        $cmt = new FreeComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->user_name = auth()->user()->name;
        $cmt->board_id = $id;
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

    public function replyStore($id)
    {
        $validation = request()->validate([
           'story' => 'required'
        ]);

        $cmt = new FreeComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->user_name = auth()->user()->name;
        $cmt->board_id = $id;
        $cmt->comment_id = request()->input('comment_id');
        $cmt->class = 1;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('frees.show', $id);
    }
}
