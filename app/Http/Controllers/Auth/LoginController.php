<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $this->validateLogin($request);
  
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        
        // Store email and hashed password in session
        $request->session()->put([
            'email' => $request->email,
            'password' => bcrypt($request->password) 
        ]);
  
        return $this->sendLoginResponse($request);
  
      }
  
      return $this->sendFailedLoginResponse($request);
    }
  
    public function logout(Request $request)
    {
      // Clear saved login data from session
      $request->session()->forget(['email','password']); 
  
      Auth::logout();
  
      return redirect('/login');
    }

 
}
