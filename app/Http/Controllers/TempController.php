<?php

namespace App\Http\Controllers;

use App\Models\Temp;
use Illuminate\Http\Request;

class TempController extends Controller
{
    public function getBoardName()
    {
        $getBoard= explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
        return $name;
    }

    public function index()
    {
        $boardName = $this->getBoardName();
        $temps = Temp::orderByDesc('id')->paginate(5);
        return view('temp.index', compact(['temps', 'boardName']));
    }

    public function show($id)
    {
        $temp = Temp::where('id', $id)->first();

        if($temp->moved == 'move'){
            return view('recycles.deleted-post');
        }

        if($temp->moved == 'move'){
            return view('temp.show-temp-message');
        }

        return view('temp.show', compact('temp'));
    }

    public function showTempMessage()
    {
        return view('temp.show-temp-message');
    }
}
