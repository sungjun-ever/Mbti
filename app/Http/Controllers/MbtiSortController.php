<?php

namespace App\Http\Controllers;

use App\Models\MbtiComment;
use App\Models\Mbti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MbtiSortController extends Controller
{
    public function mbtisName()
    {
        $mbtiSort = explode('/', $_SERVER['REQUEST_URI']);
        $name = preg_replace('/\?[a-z=&A-Z0-9]*/', '', $mbtiSort[2]);
        return $name;
    }

    public function index()
    {
        $mbtiName = $this->mbtisName();
        $mbtis = Mbti::where('mbti_board', $mbtiName)->orderBy('id', 'desc')->paginate(5);
        foreach($mbtis as $mbti){
            $mbti->user->name;
        }
        return view('mbtis.'.$mbtiName.'.index', compact(['mbtis', 'mbtiName']));
    }

    public function create()
    {
        $mbtiName = $this->mbtisName();
        return view('mbtis.'.$mbtiName.'.create', compact('mbtiName'));
    }

    function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required',
           'story' => 'required'
        ]);

        $mbti = new Mbti();
        $mbti->mbti_board = $request->mid;
        $mbti->user_id = auth()->user()->id;
        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        return redirect()->route($request->mid.'.show', $mbti->id);
    }

    public function show($id)
    {
        $mbti = Mbti::where('id', $id)->first();

        $cmts = MbtiComment::where('mbti_id', $id)
            ->orderByDesc('comment_id')
            ->orderBy('class')
            ->orderByDesc('created_at')
            ->paginate(20);

        foreach ($cmts as $cmt){
            $cmt->user;
        }

        $mbtis = Mbti::where('mbti_board', $mbti->mbti_board)->orderBy('id', 'desc')->paginate(20);

        return view('mbtis.'.$mbti->mbti_board.'.show', compact(['mbti', 'cmts', 'mbtis']));

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
        return view('mbtis.'.$mbti->mbti_board.'.edit', compact('mbti'));
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
           'story' => 'required'
        ]);

        $mbti = Mbti::where('id', $id)->first();
        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        return redirect()->route($mbti->mbti_board.'.update', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        $mbti = Mbti::where('id', $id)->first();
        $mbti -> delete();

        return redirect()->route($mbti->mbti_board.'.destroy');
    }

    public function commentStore(Request $request, $id)
    {

        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
            'story' => 'required'
        ]);

        $cmt = new MbtiComment();
        $cmt->user_id = auth()->user()->id;
        $cmt->user_name = auth()->user()->name;
        $cmt->mbti_id = $id;
        $cmt->mbti_name = $mbtiName;
        $cmt->story = $validation['story'];
        $cmt->save();

        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentDestroy(Request $request, $id)
    {
        $mbtiName = $this->mbtisName();
        return redirect()->route('mbtis.'.$mbtiName.'.show', $id);
    }

    public function commentReplyStore($id)
    {
        $cmt = MbtiComment::where('mbti_id', $id);
    }
}
