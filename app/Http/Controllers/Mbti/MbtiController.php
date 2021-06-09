<?php

namespace App\Http\Controllers\Mbti;

use App\Models\Mbti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MbtiController extends Controller
{
    public function index(Request $request)
    {
        $mbtiName = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
                     'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];

        $enfjs = Mbti::where('board_name', 'enfj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $enfps = Mbti::where('board_name', 'enfp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $entjs = Mbti::where('board_name', 'entj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $entps = Mbti::where('board_name', 'entp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $estjs = Mbti::where('board_name', 'estj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $estps = Mbti::where('board_name', 'estp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $esfjs = Mbti::where('board_name', 'esfj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $esfps = Mbti::where('board_name', 'esfp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $infjs = Mbti::where('board_name', 'infj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $infps = Mbti::where('board_name', 'infp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $intjs = Mbti::where('board_name', 'intj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $intps = Mbti::where('board_name', 'intp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $isfjs = Mbti::where('board_name', 'isfj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $isfps = Mbti::where('board_name', 'isfp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $istjs = Mbti::where('board_name', 'istj')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        $istps = Mbti::where('board_name', 'istp')->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);

        return view('mbtis.index',
                compact([
                    'enfjs', 'enfps', 'entjs', 'entps',
                    'esfjs', 'esfps', 'estjs', 'estps',
                    'infjs', 'infps', 'intjs', 'intps',
                    'isfjs', 'isfps', 'istjs', 'istps',
                    'mbtiName']));
    }

    public function search(Request $request)
    {
        $content = $request->input('content');
        $search = $request->input('search');

        $posts = Mbti::where($content, 'LIKE', "%{$search}%")->orderByDesc('created_at')->paginate(20);

        return view('mbtis.mbti-search', compact(['posts', 'search']));
    }

}
