<?php

namespace App\Http\Controllers;

use App\Models\Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function index()
    {
        $sugs = Suggest::orderBy('id', 'desc')->paginate(5);
        return view('suggests.index', compact('sugs'));
    }

    public function create()
    {
        return view('suggests.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);
        $sug = new Suggest();
        $sug->user_id = auth()->user()->id;
        $sug->user_name = auth()->user()->name;
        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        $sug->save();
        return redirect()->route('suggests.show', $sug->id);
    }

    public function show($id)
    {
        $sug = Suggest::where('id', $id)->first();
        return view('suggests.show', compact('sug'));
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
        $sug->title = $validation['title'];
        $sug->story = $validation['story'];
        $sug->save();
        return redirect()->route('suggests.show', $id);
    }

    public function destroy($id)
    {
        $sug = Suggest::where('id', $id)->first();
        $sug->delete();
        return redirect()->route('suggests.index');
    }
}
