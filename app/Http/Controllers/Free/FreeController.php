<?php

namespace App\Http\Controllers\Free;

use App\Http\Controllers\StoreImageController;
use App\Http\Controllers\GetBoardNameController;
use App\Models\Free;
use App\Models\FreeComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class FreeController extends Controller
{
    public function index()
    {
        $boardName = GetBoardNameController::getBoardName($_SERVER['REQUEST_URI']);;
        $frees = Free::orderBy('id', 'desc')->where('moved', '!=', 'move')->paginate(5);
        return view('frees.index', compact(['frees', 'boardName']));
    }

    public function create()
    {
        $boardName = GetBoardNameController::getBoardName($_SERVER['REQUEST_URI']);;
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
            mkdir('storage/img/free/'.$free->id, 0777, true);
            $name = StoreImageController::uploadImage($request, 'public/img/free/', $free);
            $free->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
            $free->image_url = 'storage/img/free/'.$free->id;
            $free->save();
        }

        return redirect()->route('frees.show', $free->id);
    }

    public function show($id)
    {
        $free = Free::where('id', $id)->first();

        if($free === null) {
            return view('recycles.deleted-post');
        }

        if($free->moved == 'move'){
            return view('temp.show-temp-message');
        }

        $cmts = FreeComment::where('board_id', $id)
            ->orderBy('comment_id')
            ->orderBy('class')
            ->orderBy('created_at')
            ->paginate(20);

        $frees = Free::where('board_name', $free->board_name)->orderBy('id', 'desc')->paginate(20);

        return view('frees.show', compact(['free', 'cmts', 'frees']));
    }

    public function edit($id)
    {
        $free = Free::where('id', $id)->first();
        $imgArr = preg_split('/[\[\]\"\s,]+/', $free->image_name, -1, PREG_SPLIT_NO_EMPTY);
        return view('frees.edit', compact(['free', 'imgArr']));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|max:30',
            'story' => 'required',
            'image[]' => 'image',
        ]);

        $free = Free::where('id', $id)->first();

        if($request->input('deleteImgName')){
            foreach ($request->input('deleteImgName') as $deleteImg){
                File::delete(storage_path('app/public/img/free/'.$free->id.'/'.$deleteImg));
            }
        }

        if($request->hasFile('image')){
            if(!is_dir('storage/img/free/'.$free->id)){
                mkdir('storage/img/free/'.$free->id, 0777, true);
            }

            $name = array_diff(scandir(public_path($free->image_url)), array('.', '..'));
            StoreImageController::uploadImage($request, 'public/img/free/', $free);
            $free->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        }

        $free->title = $validation['title'];
        $free->story = $validation['story'];
        $free->save();

        return redirect()->route('frees.show', $id);
    }

    public function destroy($id)
    {
        $free = Free::where('id', $id)->first();
        File::deleteDirectory(storage_path('app/public/img/free/'.$free->id));
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
