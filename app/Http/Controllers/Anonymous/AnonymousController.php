<?php

namespace App\Http\Controllers\Anonymous;

use App\Http\Controllers\Controller;
use App\Models\Anonymous;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


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
            'image[]' => 'image',
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

        if($request->hasFile('image')){
            mkdir('storage/img/anonymous/'.$post->id, 0777, true);
            foreach ($request->file('image') as $image){
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/anonymous/'.$post->id, $imageName);
                if(Image::make(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName))->width() > 900){
                    Image::make(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName))->resize(800, null)
                        ->save(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName));
                }
                $name[] = $imageName;
            }
        }
        $post->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        $post->image_url = 'storage/img/anonymous/'.$post->id;
        $post->save();

        return redirect()->route('anonymous.show');
    }

    public function show($id)
    {
        $post = Anonymous::where('id', $id)->first();
        if($post === null) {
            return view('recycles.deleted-post');
        }

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

        if($request->input('deleteImgName')){
            foreach ($request->input('deleteImgName') as $deleteImg){
                File::delete(storage_path('app/public/img/anonymous/'.$post->id.'/'.$deleteImg));
            }
        }

        if($request->hasFile('image')){
            if(!is_dir('storage/img/anonymous/'.$post->id)){
                mkdir('storage/img/anonymous/'.$post->id, 0777, true);
            }

            $name = array_diff(scandir(public_path($post->image_url)), array('.', '..'));

            foreach ($request->file('image') as $image){
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/anonymous/'.$post->id, $imageName);
                if(Image::make(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName))->width() > 900){
                    Image::make(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName))->resize(800, null)
                        ->save(storage_path('app/public/img/anonymous/'.$post->id.'/'.$imageName));
                }
                $name[] = $imageName;
            }
            $post->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        }

        $post->title = $validation['title'];
        $post->story = $validation['story'];
        $post->save();

        return redirect()->route('anonymous.show');
    }

    public function destroy($id)
    {
        $post = Anonymous::where('id', $id)->first();
        File::deleteDirectory(storage_path('app/public/img/anonymous/'.$post->id));
        $post->delete();

        return redirect()->route('anonymous.index');
    }
}
