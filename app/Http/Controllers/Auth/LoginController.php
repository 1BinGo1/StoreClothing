<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user) {
        $route = 'user.index';
        $message = 'Вы успешно вошли в личный кабинет';
        /*if ($user->role_id == 1) {
            $route = 'office.index';
            $message = 'Вы успешно вошли в панель управления';
        }*/
        return redirect()->route($route)
            ->with('success', $message);
    }

    protected function loggedOut(Request $request) {
        return redirect($this->redirectTo)
            ->with('success', trans('auth.loggedout'));
    }

}
