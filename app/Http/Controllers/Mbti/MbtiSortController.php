<?php

namespace App\Http\Controllers\Mbti;

use App\Http\Func\GetBoardName;
use App\Models\MbtiComment;
use App\Models\Mbti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Func\StoreImage;

class MbtiSortController extends Controller
{
    use GetBoardName;

    public function index()
    {
        $mbtiName = $this->boardName();
        $mbtis = Mbti::where('board_name', $mbtiName)->where('moved', '!=', 'move')->orderBy('id', 'desc')->paginate(5);
        foreach($mbtis as $mbti){
            $mbti->user->name;
        }
        return view('mbtis.'.$mbtiName.'.index', compact(['mbtis', 'mbtiName']));
    }

    public function create()
    {
        $mbtiName = $this->boardName();
        return view('mbtis.'.$mbtiName.'.create', compact('mbtiName'));
    }

    public function store(Request $request)
    {
        $mbtiName = $this->boardName();

        $validation = $request->validate([
           'title' => 'required',
           'story' => 'required',
           'image[]' => 'image',
        ]);

        $mbti = new Mbti();
        $mbti->board_name = $mbtiName;
        $mbti->user_id = auth()->user()->id;
        $mbti->user_name = auth()->user()->name;
        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        if($request->hasFile('image')){
            mkdir('storage/img/mbti/'.$mbti->id, 0777, true);
            $name = StoreImage::uploadImage($request, 'public/img/mbti/', $mbti);
            $mbti->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
            $mbti->image_url = 'storage/img/mbti/'.$mbti->id;
            $mbti->save();
        }

        return redirect()->route($request->mid.'.show', $mbti->id);
    }

    public function show($id)
    {
        $mbti = Mbti::where('id', $id)->first();

        if($mbti === null) {
            return view('recycles.deleted-post');
        }

        if($mbti->moved == 'move'){
            return view('temp.show-temp-message');
        }
        $cmts = MbtiComment::where('board_id', $id)
            ->orderByDesc('comment_id')
            ->orderBy('class')
            ->orderByDesc('created_at')
            ->paginate(20);

        $mbtis = Mbti::where('board_name', $mbti->board_name)->orderBy('id', 'desc')->paginate(20);

        return view('mbtis.'.$mbti->board_name.'.show', compact(['mbti', 'cmts', 'mbtis']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $mbti = Mbti::where('id', $id)->first();
        return view('mbtis.'.$mbti->board_name.'.edit', compact('mbti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
           'title' => 'required',
           'story' => 'required',
        ]);

        $mbti = Mbti::where('id', $id)->first();

        if($request->hasFile('image')){
            if(!is_dir('storage/img/mbti/'.$id)){
                mkdir('storage/img/mbti/'.$id, 0777, true);
            }

            $name = array_diff(scandir(public_path($mbti->image_url)), array('.', '..'));
            StoreImage::uploadImage($request, 'public/img/mbti/', $mbti);
            $mbti->image_url = 'storage/img/mbti/'.$mbti->id;
            $mbti->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        }

        if($request->input('deleteImgName')){
            foreach ($request->input('deleteImgName') as $deleteImg){
                File::delete(storage_path('app/public/img/mbti/'.$id.'/'.$deleteImg));
            }
        }

        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        return redirect()->route($mbti->board_name.'.update', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        $mbtiName = $this->boardName();
        $mbti = Mbti::where('id', $id)->first();
        File::deleteDirectory(storage_path('app/public/img/mbti/'.$mbti->id));
        $mbti -> delete();

        return redirect()->route($mbtiName.'.index');
    }

    public function search(Request $request)
    {
        $mbtiName = $this->boardName();

        $content = $request->input('content');
        $search = $request->input('search');

        $posts = Mbti::where('board_name', $mbtiName)->where($content, 'LIKE', "%{$search}%")->orderByDesc('created_at')->paginate(5);

        return view('mbtis.mbti-search', compact(['posts', 'search', 'content']));
    }

}
