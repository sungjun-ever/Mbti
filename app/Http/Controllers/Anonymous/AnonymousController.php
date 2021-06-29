<?php

namespace App\Http\Controllers\Anonymous;

use App\Http\Controllers\Controller;
use App\Models\Anonymous;
use Illuminate\Http\Request;

class AnonymousController extends Controller
{
    public function getBoardName()
    {
        $getBoard= explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
        return $name;
    }

    public function index(){
        $posts = Anonymous::orderByDesc('id')->paginate(5);
        $boardName = $this->getBoardName();
        return view('anonymous.index', compact(['posts', 'boardName']));
    }

    public function create(){
        $boardName = $this->getBoardName();
        return view('anonymous.create', compact('boardName'));
    }

    public function store()
    {

    }
}
