<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetBoardNameController extends Controller
{
    public static function getBoardName($uri)
    {
        $getBoard= explode('/', $uri);
        return preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
    }
}
