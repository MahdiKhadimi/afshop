<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class admin
{
    
  


    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('admin')->check()){
            session()->flash('error','Please write your Email and Password');
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
