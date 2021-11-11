<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnonymousComment;
use App\Models\Free;
use App\Models\FreeComment;
use App\Models\Mbti;
use App\Models\MbtiComment;
use Illuminate\Http\Request;

class AllCommentController extends Controller
{
    public function index()
    {
        $mbtis = MbtiComment::whereNotNull('board_name');
        $frees = FreeComment::whereNotNull('board_name')->unionAll($mbtis);
        $all = AnonymousComment::whereNotNull('board_name')->unionAll($frees)->orderByDesc('created_at')->paginate(20,
            ['*'], 'comments');

        return view('admin.all-comment', compact('all'));
    }

    public function search(Request $request)
    {
        $content = $request->input('content');
        $search = $request->input('search');

        $mbtis = MbtiComment::where($content, 'LIKE', "%{$search}%");
        $all = FreeComment::where($content, 'LIKE', "%{$search}%")->unionAll($mbtis)->orderByDesc('created_at')->paginate(20);

        return view('admin.comment-search', compact(['all', 'content', 'search']));
    }
}
