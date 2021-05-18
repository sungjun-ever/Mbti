<?php

namespace App\Http\Controllers\Suggest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    public function confirmPage()
    {
        return view('suggests.confirm');
    }
}
