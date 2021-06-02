<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getUser()
    {
        $users = User::where('is_admin', 0)->orderByDesc('created_at')->paginate(5, ['*'], 'userPage');
        return view('admin.get-user', compact('users'));
    }

    public function block(Request $request)
    {
        $days = $request->input('days');
        $user = User::where('email', $request->input('email'))->first();
    }

}
