<?php

namespace App\Http\Controllers;

use App\Models\Mbti;
use Illuminate\Http\Request;

class MbtiController extends Controller
{
    public function index(Request $request)
    {
        $enfjs = Mbti::where('mbtiSort', 'enfj')->orderBy('id', 'desc')->paginate(5);
        $enfps = Mbti::where('mbtiSort', 'enfp')->orderBy('id', 'desc')->paginate(5);
        $entjs = Mbti::where('mbtiSort', 'entj')->orderBy('id', 'desc')->paginate(5);
        $entps = Mbti::where('mbtiSort', 'entp')->orderBy('id', 'desc')->paginate(5);
        $estjs = Mbti::where('mbtiSort', 'estj')->orderBy('id', 'desc')->paginate(5);
        $estps = Mbti::where('mbtiSort', 'estp')->orderBy('id', 'desc')->paginate(5);
        $esfjs = Mbti::where('mbtiSort', 'esfj')->orderBy('id', 'desc')->paginate(5);
        $esfps = Mbti::where('mbtiSort', 'esfp')->orderBy('id', 'desc')->paginate(5);
        $infjs = Mbti::where('mbtiSort', 'infj')->orderBy('id', 'desc')->paginate(5);
        $infps = Mbti::where('mbtiSort', 'infp')->orderBy('id', 'desc')->paginate(5);
        $intjs = Mbti::where('mbtiSort', 'intj')->orderBy('id', 'desc')->paginate(5);
        $intps = Mbti::where('mbtiSort', 'intp')->orderBy('id', 'desc')->paginate(5);
        $isfjs = Mbti::where('mbtiSort', 'isfj')->orderBy('id', 'desc')->paginate(5);
        $isfps = Mbti::where('mbtiSort', 'isfp')->orderBy('id', 'desc')->paginate(5);
        $istjs = Mbti::where('mbtiSort', 'istj')->orderBy('id', 'desc')->paginate(5);
        $istps = Mbti::where('mbtiSort', 'istp')->orderBy('id', 'desc')->paginate(5);

        return view('mbtis.index',
                compact([
                    'enfjs',
                    'enfps',
                    'entjs',
                    'entps',
                    'esfjs',
                    'esfps',
                    'estjs',
                    'estps',
                    'infjs',
                    'infps',
                    'intjs',
                    'intps',
                    'isfjs',
                    'isfps',
                    'istjs',
                    'istps']));
    }

}
