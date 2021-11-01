<?php


namespace App\Http\Func;


use Carbon\Carbon;
use Illuminate\Support\Str;

class HandleAnonymousName
{
    public static function createAnonymousName($user)
    {
        if($user->anony_name === null || $user->anony_created != Carbon::now()->format('Ymd')){

            $user->anony_created = Carbon::now()->format('Ymd');
            $user->anony_name = Str::random(8);
            $user->save();
        }
    }
}
