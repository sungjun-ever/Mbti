<?php

namespace App\Http\Controllers;

use App\Models\Free;
use App\Models\Mbti;
use App\Models\Suggest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mbtis = Mbti::orderBy('id', 'desc')->paginate(5);
        $frees = Free::orderBy('id', 'desc')->paginate(5);
        $sugs = Suggest::orderBy('id', 'desc')->paginate(5);
        return view('home', compact(['mbtis', 'frees', 'sugs']));
    }
}
