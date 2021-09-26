<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $role = Auth::user()->role; //

        switch ($role) {
            case 'super-admin':
                return redirect()->route('offer-claims.index')->with('message', 'You are now Logged In.');
                break;

            case 'admin':
                return redirect()->route('offer-claims.index')->with('message', 'You are now Logged In.');
                break;

            default:
                return '/login';
                break;
        }
    }

    protected function authenticated(Request $request, $user)
    {
        $role = Auth::user()->role; //

        switch ($role) {
            case 'super-admin':
                return redirect()->route('offer-claims.index')->with('message', 'You are now Logged In.');
                break;

            case 'admin':
                return redirect()->route('offer-claims.index')->with('message', 'You are now Logged In.');
                break;

            default:
                return '/login';
                break;
        }
    }

    public function credentials(Request $request)
    {
        $credentials =  $request->only($this->username(), 'password');
        $credentials['status'] = 1;
        return $credentials;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();
        // Check if user was successfully loaded, that the password matches
        // and user is blocked. If so, override the default error message.
        if ($user && \Hash::check($request->password, $user->password) && $user->status == 0) {
            $errors = [$this->username() => 'Your account is Currently Blocked.'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    /**
     * Log out the user from the system
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login')->with('message', 'You have been logged out');
    }
}
