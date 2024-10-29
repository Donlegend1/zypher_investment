<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User; // Add this line to import the User model

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'login';
    }

    protected function attemptLogin(Request $request)
    {
        $loginField = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Retrieve the user based on login field
        $user = User::where($loginField, $request->input('login'))->first();

        // Check if the user exists and if the account is suspended
        if ($user && $user->suspended) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.suspended')],
            ]);
        }

        // Proceed with the normal login attempt
        return Auth::attempt([$loginField => $request->input('login'), 'password' => $request->input('password')], $request->filled('remember'));
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    }
}