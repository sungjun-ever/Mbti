<?php

namespace App\Http\Func;

class GetBoardName
{
    public static function mbtiBoard()
    {
        return ['enfj', 'enfp', 'entj', 'entp', 'estj', 'estp', 'esfj', 'esfp',
            'infj', 'infp', 'intj', 'intp', 'isfj', 'isfp', 'istj', 'istp'];
    }

    public static function boardName()
    {
        $getBoard = explode('/', $_SERVER['REQUEST_URI']);
        return preg_replace('/\?[a-z=&A-Z0-9]*/', '', $getBoard[1]);
    }
}
