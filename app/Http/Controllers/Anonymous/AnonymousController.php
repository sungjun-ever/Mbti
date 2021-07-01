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

        if($user->anony_name === null || $user->annoy_created != Carbon::now()->day){
            $user->annoy_created = Carbon::now()->day;
            $user->annony_name = Str::random(6);
            $user->save();
        }

        return redirect()->route('anonymous.show');
    }
}
