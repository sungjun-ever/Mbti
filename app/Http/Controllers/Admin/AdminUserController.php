<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getUser()
    {
        $users = User::where('is_admin', 0)->orderByDesc('created_at')->paginate(20, ['*'], 'userPage');
        return view('admin.get-user', compact('users'));
    }

    public function block(Request $request)
    {
        $days = $request->input('days');
        $user = User::where('email', $request->input('email'))->first();
        switch ($days){
            case "7":
                $bannedAt = Carbon::now()->addWeeks();
                $user->banned_at = $bannedAt;
                $user->save();
                break;

            case "30":
                $bannedAt = Carbon::now()->addMonths();
                $user->banned_at = $bannedAt;
                $user->save();
                break;

            case "90":
                $bannedAt = Carbon::now()->addMonths(3);
                $user->banned_at = $bannedAt;
                $user->save();
                break;

            case "180":
                $bannedAt = Carbon::now()->addMonths(6);
                $user->banned_at = $bannedAt;
                $user->save();
                break;

            case "365":
                $bannedAt = Carbon::now()->addYears();
                $user->banned_at = $bannedAt;
                $user->save();
                break;

            case "ever":
                $bannedAt = Carbon::now()->addYears(999);
                $user->banned_at = $bannedAt;
                $user->save();
                break;
        }

        return redirect()->route('admin.getUser');
    }

    public function removeBlock(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if($user->banned_at >= Carbon::now()){
            $user->banned_at = null;
            $user->save();
        }
        return redirect()->route('admin.getUser');
    }

}
