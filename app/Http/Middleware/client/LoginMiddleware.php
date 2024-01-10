<?php

namespace App\Http\Middleware\client;

use Closure;
use Illuminate\Http\Request;
use App\Common\Constants;
use App\Models\User;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()){
          //  dd(auth()->user());
            if(User::where('is_admin',false)->where('status',1)->where('id',auth()->user()->id)->first()){
               return $next($request);  
            }
        }
         return redirect()->route('login'); 
    }
}
