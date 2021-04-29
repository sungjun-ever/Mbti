<?php

namespace App\Http\Controllers;

use App\Models\FreeComment;
use Illuminate\Http\Request;

class FreeCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validation = $request->validate([
           'story' => 'required'
        ]);

        $cmt = new FreeComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->free_id = $id;
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

    }
}
