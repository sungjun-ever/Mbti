<?php

namespace App\Http\Controllers\Free;

use App\Models\Free;
use App\Models\FreeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
        $frees = Free::orderBy('id', 'desc')->where('moved', '!=', 'move')->paginate(5);
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
            'title' => 'required|max:50',
            'story' => 'required',
            'image[]' => 'image',
        ]);



        $free = new Free();
        $free->user_id = auth()->user()->id;
        $free->user_name = auth()->user()->name;
        $free->title = $validation['title'];
        $free->story = $validation['story'];
        $free->save();

        if($request->hasFile('image')){
            foreach ($request->file('image') as $image){
                $imageName = $image->getClientOriginalName();
                $path = $image->storeAs('public/img/free/', $imageName);
                $img = Image::make(storage_path('app/public/img/free/'. $imageName))->resize(150, null)
                    ->save(storage_path('app/public/img/free/'. $imageName));
                $free->image_url = $path;
            }
        }
        $free->save();

        return redirect()->route('frees.show', $free->id);
    }

    public function show($id)
    {
        $free = Free::where('id', $id)->first();

        if($free->moved == 'move'){
            return redirect()->route('temp.message');
        }

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

    public function search(Request $request)
    {
        $content = $request->input('content');
        $search = $request->input('search');

        $posts = Free::where($content, 'LIKE', "%{$search}%")->paginate(5);

        return view('frees.search', compact(['posts', 'content', 'search']));
    }
}
