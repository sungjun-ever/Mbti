<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnonymousNameController extends Controller
{
    public function make()
    {
        $currentTime = Carbon::now();
        $users = User::all();
        if($currentTime->hour === 0 && $currentTime->minute === 0){
            foreach ($users as $user){
                $user->anony_name = strtoupper(Str::random(6));
                $user->save();
            }
        }
    }
}
