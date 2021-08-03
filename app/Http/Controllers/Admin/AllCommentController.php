<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Free;
use App\Models\FreeComment;
use App\Models\Mbti;
use App\Models\MbtiComment;
use Illuminate\Http\Request;

class AllCommentController extends Controller
{
    public function index()
    {
        $mbtiGroup = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
            'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];
        $mbtis = MbtiComment::whereNotNull('board_name');
        $all = FreeComment::whereNotNull('board_name')->unionAll($mbtis)->orderByDesc('board_name')->paginate(20, ['*'], 'posts');

        return view('admin.all-comment', compact(['all']));
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
