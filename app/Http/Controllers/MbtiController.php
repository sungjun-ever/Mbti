<?php

namespace App\Http\Controllers;

use App\Models\Mbti;
use Illuminate\Http\Request;

class MbtiController extends Controller
{
    public function index(Request $request)
    {
        $mbtiName = ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
                     'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];

        $enfjs = Mbti::where('board_name', 'enfj')->orderBy('id', 'desc')->paginate(5);
        $enfps = Mbti::where('board_name', 'enfp')->orderBy('id', 'desc')->paginate(5);
        $entjs = Mbti::where('board_name', 'entj')->orderBy('id', 'desc')->paginate(5);
        $entps = Mbti::where('board_name', 'entp')->orderBy('id', 'desc')->paginate(5);
        $estjs = Mbti::where('board_name', 'estj')->orderBy('id', 'desc')->paginate(5);
        $estps = Mbti::where('board_name', 'estp')->orderBy('id', 'desc')->paginate(5);
        $esfjs = Mbti::where('board_name', 'esfj')->orderBy('id', 'desc')->paginate(5);
        $esfps = Mbti::where('board_name', 'esfp')->orderBy('id', 'desc')->paginate(5);
        $infjs = Mbti::where('board_name', 'infj')->orderBy('id', 'desc')->paginate(5);
        $infps = Mbti::where('board_name', 'infp')->orderBy('id', 'desc')->paginate(5);
        $intjs = Mbti::where('board_name', 'intj')->orderBy('id', 'desc')->paginate(5);
        $intps = Mbti::where('board_name', 'intp')->orderBy('id', 'desc')->paginate(5);
        $isfjs = Mbti::where('board_name', 'isfj')->orderBy('id', 'desc')->paginate(5);
        $isfps = Mbti::where('board_name', 'isfp')->orderBy('id', 'desc')->paginate(5);
        $istjs = Mbti::where('board_name', 'istj')->orderBy('id', 'desc')->paginate(5);
        $istps = Mbti::where('board_name', 'istp')->orderBy('id', 'desc')->paginate(5);

        return view('mbtis.index',
                compact([
                    'enfjs', 'enfps', 'entjs', 'entps',
                    'esfjs', 'esfps', 'estjs', 'estps',
                    'infjs', 'infps', 'intjs', 'intps',
                    'isfjs', 'isfps', 'istjs', 'istps',
                    'mbtiName']));
    }

}
