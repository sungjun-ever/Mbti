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

    public function index(Request $request)
    {
        $boardName = $this->getBoardName();
        $temps = Temp::orderByDesc('id')->paginate(5);
        return view('temp.index', compact(['temps', 'boardName']));
    }

    public function show()
    {
        return view('temp.show');
    }
}
