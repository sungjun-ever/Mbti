<?php

namespace App\Http\Controllers;

use App\Models\Anonymous;
use App\Models\Free;
use App\Models\Mbti;
use App\Models\Suggest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mbtis = Mbti::orderBy('id', 'desc')->where('moved', '!=', 'move')->paginate(5);
        $frees = Free::orderBy('id', 'desc')->where('moved', '!=', 'move')->paginate(5);
        $anonys = Anonymous::orderBy('id', 'desc')->where('moved', '!=', 'move')->paginate(5);
        return view('home', compact(['mbtis', 'frees', 'anonys']));
    }

    public function destroy()
    {
        return view('recycles.deleted-post');
    }
}
