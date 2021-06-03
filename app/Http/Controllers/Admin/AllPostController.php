<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Free;
use App\Models\Mbti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllPostController extends Controller
{
    public function index()
    {
        $mbtiGroup = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
            'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];
        $mbtis = DB::table('mbtis');
        $all = DB::table('frees')->unionAll($mbtis)->orderByDesc('created_at')->paginate(20, ['*'], 'posts');

        return view('admin.all-post', compact(['all', 'mbtiGroup']));
    }
}
