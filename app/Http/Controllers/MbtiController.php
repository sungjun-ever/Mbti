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

        $enfjs = Mbti::where('mbti_board', 'enfj')->orderBy('id', 'desc')->paginate(5);
        $enfps = Mbti::where('mbti_board', 'enfp')->orderBy('id', 'desc')->paginate(5);
        $entjs = Mbti::where('mbti_board', 'entj')->orderBy('id', 'desc')->paginate(5);
        $entps = Mbti::where('mbti_board', 'entp')->orderBy('id', 'desc')->paginate(5);
        $estjs = Mbti::where('mbti_board', 'estj')->orderBy('id', 'desc')->paginate(5);
        $estps = Mbti::where('mbti_board', 'estp')->orderBy('id', 'desc')->paginate(5);
        $esfjs = Mbti::where('mbti_board', 'esfj')->orderBy('id', 'desc')->paginate(5);
        $esfps = Mbti::where('mbti_board', 'esfp')->orderBy('id', 'desc')->paginate(5);
        $infjs = Mbti::where('mbti_board', 'infj')->orderBy('id', 'desc')->paginate(5);
        $infps = Mbti::where('mbti_board', 'infp')->orderBy('id', 'desc')->paginate(5);
        $intjs = Mbti::where('mbti_board', 'intj')->orderBy('id', 'desc')->paginate(5);
        $intps = Mbti::where('mbti_board', 'intp')->orderBy('id', 'desc')->paginate(5);
        $isfjs = Mbti::where('mbti_board', 'isfj')->orderBy('id', 'desc')->paginate(5);
        $isfps = Mbti::where('mbti_board', 'isfp')->orderBy('id', 'desc')->paginate(5);
        $istjs = Mbti::where('mbti_board', 'istj')->orderBy('id', 'desc')->paginate(5);
        $istps = Mbti::where('mbti_board', 'istp')->orderBy('id', 'desc')->paginate(5);

        return view('mbtis.index',
                compact([
                    'enfjs', 'enfps', 'entjs', 'entps',
                    'esfjs', 'esfps', 'estjs', 'estps',
                    'infjs', 'infps', 'intjs', 'intps',
                    'isfjs', 'isfps', 'istjs', 'istps',
                    'mbtiName']));
    }

}
