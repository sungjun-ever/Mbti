<?php

namespace App\Http\Controllers;

use App\Models\Free;
use Illuminate\Http\Request;

class FreeController extends Controller
{
    public function index()
    {
        $frees = Free::orderBy('id', 'desc')->paginate(5);
        return view('frees.index', compact('frees'));
    }

    public function create()
    {
        return view('frees.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
           'title' => 'required|max:30',
           'story' => 'required'
        ]);

        $free = new Free();
        $free->user_id = auth()->user()->id;
        $free->user_name = auth()->user()->name;
        $free->title = $validation['title'];
        $free->story = $validation['story'];
        $free->save();

        return redirect()->route('frees.show', $free->id);
    }

    public function show($id)
    {
        $free = Free::where('id', $id)->first();
        return view('frees.show', compact('free'));
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
}
