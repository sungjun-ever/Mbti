<?php

namespace App\Http\Controllers\Anonymous;

use App\Http\Func\HandleAnonymousName;
use App\Models\AnonymousComment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnonymousCommentController extends Controller
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

        $user = User::where('id', auth()->user()->id)->first();

        HandleAnonymousName::createAnonymousName($user);

        $cmt = new AnonymousComment();
        $cmt->user_id = $user->id;
        $cmt->user_name = $user->anony_name;
        $cmt->board_id = $id;
        $cmt->story = $validation['story'];
        $cmt->save();
        $cmt->comment_id = $cmt->id;
        $cmt->save();

        return redirect()->route('anonymous.show', $id);
    }

    public function update(Request $request, $id, $cmtId)
    {
        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = AnonymousComment::where('id', $cmtId)->first();
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('anonymous.show', $id);
    }

    public function destroy($id, $cmtId)
    {
        $cmt = AnonymousComment::where('id', $cmtId)->first();
        $cmt->status = 'delete';
        $cmt->save();

        return redirect()->route('anonymous.show', $id);
    }

    public function replyStore($id)
    {
        $validation = request()->validate([
            'story' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        HandleAnonymousName::createAnonymousName($user);

        $cmt = new AnonymousComment();
        $cmt->user_id = $user->id;
        $cmt->user_name = $user->anony_name;
        $cmt->board_id = $id;
        $cmt->comment_id = request()->input('comment_id');
        $cmt->class = 1;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('anonymous.show', $id);
    }
}
