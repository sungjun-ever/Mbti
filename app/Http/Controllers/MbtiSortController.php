<?php

namespace App\Http\Controllers;

use App\Models\Mbti;
use Illuminate\Http\Request;

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
        $mbtis = Mbti::where('mbtiSort', $mbtiName)->orderBy('id', 'desc')->paginate(5);
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
        $mbti->mbtiSort = $request->mid;
        $mbti->user_id = auth()->user()->id;
        $mbti->user_name = auth()->user()->name;
        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        return redirect()->route('mbtis.'.$request->mid.'.show', $mbti->id);
    }

    public function show($id)
    {
        $mbtiName = $this->mbtisName();
        $mbti = Mbti::where('id', $id)->first();
        return view('mbtis.'.$mbtiName.'.show', compact('mbti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $mbtiName = $this->mbtisName();
        $mbti = Mbti::where('id', $id)->first();
        return view('mbtis.'.$mbtiName.'.edit', compact('mbti'));
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
        $mbtiName = $this->mbtisName();

        $validation = $request->validate([
           'title' => 'required',
           'story' => 'required'
        ]);

        $mbti = Mbti::where('id', $id)->first();
        $mbti->title = $validation['title'];
        $mbti->story = $validation['story'];
        $mbti->save();

        return redirect()->route('mbtis.'.$mbtiName.'.update', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        $mbtiName = $this->mbtisName();
        $mbti = Mbti::where('id', $id)->first();
        $mbti -> delete();

        return redirect()->route('mbtis.'.$mbtiName.'.destroy');
    }
}
