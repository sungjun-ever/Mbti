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

    public function index()
    {
        $users = User::where('is_admin', 0)->orderByDesc('created_at')->paginate(5, ['*'], 'userPage');
        return view('admin.index', compact('users'));
    }

}
