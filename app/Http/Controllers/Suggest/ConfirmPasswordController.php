<?php

namespace App\Http\Controllers\Suggest;

use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfirmPasswordController extends Controller
{
    public function confirmPage()
    {
        return view('suggests.confirm');
    }

    /**
     * Confirm the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function confirm(Request $request)
    {
        $id = $request->session()->get('post_id');
        $post = Suggest::where('id', $id)->first();
        $this->resetPasswordConfirmationTimeout($request);
        if(password_verify($request->password, $post->post_password)){
            $request->session()->pull('post_id');
            return redirect()->intended(Session::get('url.intended'));
        }
        return redirect()->back();
    }

    /**
     * Reset the password confirmation timeout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('suggest.password_confirmed_at', time());
    }

}
