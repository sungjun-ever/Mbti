<?php

namespace App\Http\Controllers\Suggest;

use App\Models\Suggest;
use App\Models\SuggestComment;
use App\Rules\IsValidPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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
            'title' => ['required', 'max:30'],
            'story' => 'required',
            'post_password' => ['required', 'min:8'],
            'image[]'=>'image',
        ]);

        $sug = new Suggest();
        $sug->user_id = auth()->user()->id;
        $sug->user_name = auth()->user()->name;
        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        $sug->post_password = Hash::make($validation['post_password']);
        $sug->save();

        if($request->hasFile('image')){
            mkdir('storage/img/suggest/'.$sug->id, 0777, true);
            foreach ($request->file('image') as $image){
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/suggest/'.$sug->id, $imageName);
                if(Image::make(storage_path('app/public/img/suggest/'.$sug->id.'/'.$imageName))->width() > 900){
                    Image::make(storage_path('app/public/img/suggest/'.$sug->id.'/'.$imageName))->resize(800, null)
                        ->save(storage_path('app/public/img/suggest/'.$sug->id.'/'.$imageName));
                }
                $name[] = $imageName;
            }
        }
        $sug->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        $sug->image_url = 'storage/img/suggest/'.$sug->id;
        $sug->save();

        return redirect()->route('suggests.show', $sug->id);
    }

    public function show($id)
    {
        $sug = Suggest::where('id', $id)->first();

        if($sug === null) {
            return view('recycles.deleted-post');
        }

        $cmts = SuggestComment::where('board_id', $id)->paginate(20);

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

        if($request->input('deleteImgName')){
            foreach ($request->input('deleteImgName') as $deleteImg){
                File::delete(storage_path('app/public/img/sug/'.$sug->id.'/'.$deleteImg));
            }
        }

        if($request->hasFile('image')){
            if(!is_dir('storage/img/sug/'.$sug->id)){
                mkdir('storage/img/sug/'.$sug->id, 0777, true);
            }

            $name = array_diff(scandir(public_path($sug->image_url)), array('.', '..'));

            foreach ($request->file('image') as $image){
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/sug/'.$sug->id, $imageName);
                if(Image::make(storage_path('app/public/img/sug/'.$sug->id.'/'.$imageName))->width() > 900){
                    Image::make(storage_path('app/public/img/sug/'.$sug->id.'/'.$imageName))->resize(800, null)
                        ->save(storage_path('app/public/img/sug/'.$sug->id.'/'.$imageName));
                }
                $name[] = $imageName;
            }
            $sug->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        }

        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        $sug->save();
        return redirect()->route('suggests.show', $id);
    }

    public function destroy($id)
    {
        $sug = Suggest::where('id', $id)->first();
        File::deleteDirectory(storage_path('app/public/img/sug/'.$sug->id));
        $sug->delete();
        return redirect()->route('suggests.index');
    }
}
