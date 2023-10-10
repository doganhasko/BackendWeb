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
      
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('web')->attempt($credentials)) {
            // Regular user login successful
            return redirect()->intended('/home');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            // Admin user login successful
            return redirect()->intended('/admin');
        }
    
        // Login failed for both regular and admin users
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
  
    public function logout(Request $request)
    {
      // Clear saved login data from session
      $request->session()->forget(['email','password']); 
  
      Auth::logout();
  
      return redirect('/');
    }

 
}
