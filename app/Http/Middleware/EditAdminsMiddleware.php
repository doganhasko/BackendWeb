<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditAdminsMiddleware {

  public function handle($request, Closure $next)
  {
    if(Auth::check() && Auth::user()->is_admin == 1){
      return $next($request);  
    }

    return redirect('/'); // redirect non-admin users
  }

}