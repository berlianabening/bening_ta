<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/home';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {
    return view('pages.welcome');
  }

  public function username()
  {
    $identity  = request()->get('identity');
    $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    request()->merge([$fieldName => $identity]);
    return $fieldName;
  }

  protected function validateLogin(Request $request)
  {
    $this->validate(
      $request,
      [
        'identity' => 'required|string',
        'password' => 'required|string',
      ],
      [
        'identity.required' => 'Username is required',
        'password.required' => 'Password is required',
      ]
    );
  }

  protected function sendFailedLoginResponse(Request $request)
  {
    $request->session()->put('login_error', trans('auth.failed'));
    throw ValidationException::withMessages(
      [
        'error' => [trans('auth.failed')],
      ]
    );
  }
}
