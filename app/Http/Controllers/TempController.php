<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{

    public function index(Request $request)
    {
        return view('temp.index');
    }

    public function show()
    {
        return view('temp.show');
    }
}
