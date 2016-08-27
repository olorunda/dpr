<?php

namespace App\Http\Middleware;

use Closure;

class regcomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if($request->user()->complete=="1"){
			
			return redirect('/profile');
		}
        return $next($request);
    }
}
