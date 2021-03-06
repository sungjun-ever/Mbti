<?php

namespace App\Http\Controllers;

use App\Http\Func\GetBoardName;
use App\Models\Temp;

class TempController extends Controller
{
    public function index()
    {
        $boardName = GetBoardName::boardName();
        $temps = Temp::orderByDesc('id')->paginate(5);
        return view('temp.index', compact(['temps', 'boardName']));
    }

    public function show($id)
    {
        $temp = Temp::where('id', $id)->first();

        if($temp == null){
            return view('recycles.deleted-post');
        }

        return view('temp.show', compact('temp'));
    }

}
