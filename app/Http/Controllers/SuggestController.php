<?php

namespace App\Http\Controllers;

use App\Models\Suggest;
use App\Models\SuggestComment;
use Illuminate\Http\Request;

class SuggestController extends Controller
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
        $sugs = Suggest::orderBy('id', 'desc')->paginate(5);
        return view('suggests.index', compact(['boardName', 'sugs']));
    }

    public function create()
    {
        $boardName = $this->getBoardName();
        return view('suggests.create', compact('boardName'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);

        $sug = new Suggest();
        $sug->user_id = auth()->user()->id;
        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        if($request->input('secret_checkbox')){
            $sug->secret = true;
        }
        $sug->save();
        return redirect()->route('suggests.show', $sug->id);
    }

    public function show($id)
    {
        $sug = Suggest::where('id', $id)->first();
        $cmts = SuggestComment::where('board_id', $id)->paginate(20);
        if($sug->secret === 1){
            if(auth()->user()->id === $sug->user_id || auth()->user()->is_admin === 1){
                return view('suggests.show', compact(['sug', 'cmts']));
            } else {
                return redirect()->back();
            }
        }
        return view('suggests.show', compact(['sug', 'cmts']));
    }

    public function edit($id)
    {
        $sug = Suggest::where('id', $id)->first();
        return view('suggests.edit', compact('sug'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
           'title'=>'required|max:30',
           'story'=>'required'
        ]);

        $sug = Suggest::where('id', $id)->first();
        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        $sug->save();
        return redirect()->route('suggests.show', $id);
    }

    public function destroy($id)
    {
        $sug = Suggest::where('id', $id)->first();
        $sug->delete();
        return redirect()->route('suggests.index');
    }
}
