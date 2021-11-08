<?php

namespace App\Http\Controllers\Anonymous;

use App\Http\Controllers\Controller;
use App\Http\Func\GetBoardName;
use App\Http\Func\HandleImage;
use App\Http\Func\HandleAnonymousName;
use App\Models\Anonymous;
use App\Models\AnonymousComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnonymousController extends Controller
{
    use GetBoardName;
    public function index()
    {
        $posts = Anonymous::orderByDesc('id')->paginate(5);
        $boardName = GetBoardName::boardName();
        return view('anonymous.index', compact(['posts', 'boardName']));
    }

    public function create()
    {
        $boardName = GetBoardName::boardName();

        return view('anonymous.create', compact('boardName'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|max:30',
            'story' => 'required',
            'image[]' => 'image',
        ]);

        $user = User::where('id', auth()->user()->id)->first();

        HandleAnonymousName::createAnonymousName($user);

        $post = new Anonymous();
        $post->user_id = $user->id;
        $post->anony_name = $user->anony_name;
        $post->title = $validation['title'];
        $post->story = $validation['story'];
        $post->save();

        if($request->hasFile('image')){
            mkdir('storage/img/anonymous/'.$post->id, 0777, true);
            $name = HandleImage::uploadImage($request, 'public/img/anonymous/', $post);
            $post->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
            $post->image_url = 'storage/img/anonymous/'.$post->id;
            $post->save();
        }

        return redirect()->route('anonymous.show', $post->id);
    }

    public function show($id)
    {
        $post = Anonymous::where('id', $id)->first();

        if($post === null) {
            return view('recycles.deleted-post');
        }

        if($post->moved == 'move'){
            return view('temp.show-temp-message');
        }

        $cmts = AnonymousComment::where('board_id', $id)
            ->orderBy('comment_id')
            ->orderBy('class')
            ->paginate(20);

        $posts = Anonymous::where('board_name', $post->board_name)->orderBy('id', 'desc')->paginate(20);

        return view('anonymous.show', compact(['post', 'cmts', 'posts']));
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

        HandleImage::updateImage($request, 'storage/img/anonymous/', 'public/img/anonymous/', $id, $post);
        HandleImage::deleteImage($request, 'app/public/img/anonymous/', $id);

        $post->title = $validation['title'];
        $post->story = $validation['story'];
        $post->save();

        return redirect()->route('anonymous.show', $post->id);
    }

    public function destroy($id)
    {
        $post = Anonymous::where('id', $id)->first();
        File::deleteDirectory(storage_path('app/public/img/anonymous/'.$post->id));
        $post->delete();

        return redirect()->route('anonymous.index');
    }

    public function search(Request $request)
    {
        $content = $request->input('content');
        $search = $request->input('search');

        $posts = Anonymous::where($content, 'LIKE', "%{$search}%")->paginate(5);

        return view('anonymous.search', compact(['posts', 'content', 'search']));
    }
}
