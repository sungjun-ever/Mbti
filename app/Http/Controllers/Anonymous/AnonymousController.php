<?php

namespace App\Http\Controllers\Anonymous;

use App\Http\Controllers\Controller;
use App\Models\Anonymous;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AnonymousController extends Controller
{
    public function getBoardName()
    {
        $getBoard= explode('/', $_SERVER['REQUEST_URI']);
        return preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
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

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:30',
            'story' => 'required',
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        if($user->anony_name === null || $user->anony_created != Carbon::now()->day){
            $user->anony_created = Carbon::now()->day;
            $user->anony_name = Str::random(8);
            $user->save();
        }

        $post = new Anonymous();
        $post->user_id = auth()->user()->id;
        $post->anony_name = $user->anony_name;
        $post->title = $validation['title'];
        $post->story = $validation['story'];
        $post->save();

        return redirect()->route('anonymous.show');
    }

    public function show($id)
    {
        $post = Anonymous::where('id', $id)->first();

        return view('anonymous.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Anonymous::where('id', $id)->first();

        return view('anonymous.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|max:30',
            'story' => 'required',
        ]);

        $post = Anonymous::where('id', $id)->first();

        $post->title = $validation['title'];
        $post->story = $validation['story'];
        $post->save();

        return redirect()->route('anonymous.show');
    }

    public function destroy($id)
    {
        $post = Anonymous::where('id', $id)->first();
        $post->delete();

        return redirect()->route('anonymous.index');
    }
}
