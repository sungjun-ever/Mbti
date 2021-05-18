<?php

namespace App\Http\Controllers\Suggest;

use App\Http\Controllers\Controller;
use App\Models\SuggestComment;
use Illuminate\Http\Request;

class SuggestCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = new SuggestComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->board_id = $id;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('suggests.show', $id);
    }

    public function update(Request $request, $id, $cmtId)
    {
        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = SuggestComment::where('id', $cmtId)->first();
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('suggests.show', $id);
    }

    public function destroy($id, $cmtId)
    {
        $cmt = SuggestComment::where('id', $cmtId)->first();
        $cmt->status = 'delete';
        $cmt->save();

        return redirect()->route('suggests.show', $id);
    }

    public function replyStore($id, $cmtId)
    {
        $validation = request()->validate([
            'story' => 'required'
        ]);

        $cmt = new SuggestComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->board_id = $id;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('suggests.show', $id);
    }
}
