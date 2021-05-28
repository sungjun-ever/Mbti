<?php

namespace App\Http\Controllers\Free;

use App\Models\Free;
use App\Models\FreeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FreeController extends Controller
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
        $frees = Free::orderBy('id', 'desc')->paginate(5);
        return view('frees.index', compact(['frees', 'boardName']));
    }

    public function create()
    {
        $boardName = $this->getBoardName();
        return view('frees.create', compact('boardName'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);

        $free = new Free();
        $free->user_id = auth()->user()->id;
        $free->user_name = auth()->user()->name;
        $free->title = $validation['title'];
        $free->story = $validation['story'];
        $free->save();

        return redirect()->route('frees.show', $free->id);
    }

    public function show($id)
    {
        $free = Free::where('id', $id)->first();

        $cmts = FreeComment::where('board_id', $id)
            ->orderByDesc('comment_id')
            ->orderBy('class')
            ->orderByDesc('created_at')
            ->paginate(20);

        $frees = Free::where('board_name', $free->board_name)->orderBy('id', 'desc')->paginate(20);

        return view('frees.show', compact(['free', 'cmts', 'frees']));
    }

    public function edit($id)
    {
        $free = Free::where('id', $id)->first();
        return view('frees.edit', compact('free'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);

        $free = Free::where('id', $id)->first();

        $free->title = $validation['title'];
        $free->story = $validation['story'];
        $free->save();

        return redirect()->route('frees.show', $id);
    }

    public function destroy($id)
    {
        $free = Free::where('id', $id)->first();
        $free->delete();

        return redirect()->route('frees.index');
    }
}