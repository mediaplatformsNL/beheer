<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Voeg deze methode toe om expliciet de custom view te gebruiken
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true
                ]);
            }

            return $this->sendLoginResponse($request);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => trans('auth.failed')
            ], 422);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // Voeg deze methode toe om de redirect na het uitloggen aan te passen
    protected function loggedOut(Request $request)
    {
        return redirect('/inloggen');
    }
}
