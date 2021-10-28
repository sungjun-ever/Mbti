<?php

namespace App\Http\Func;

trait GetBoardName
{
    public static function boardName()
    {
        $getBoard = explode('/', $_SERVER['REQUEST_URI']);
        return preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
    }
}
