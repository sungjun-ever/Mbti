<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a Func
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google') -> redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google') -> user();
            $findUser = User::where('google_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
                return redirect() -> route('home');
            } else {
                $newUser = new User();
                $newUser->name = $user['name'];
                $newUser->email = $user['email'];
                $newUser->google_id = $user['sub'];
                $newUser->save();
                Auth::login($newUser);
                return redirect() -> route('home');
            }
        } catch (\Exception $e){
            return redirect()->route('login');
        }
    }
}
