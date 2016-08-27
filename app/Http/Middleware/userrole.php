<?php

namespace App\Http\Middleware;

use Closure;
use Crypt;
class userrole
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
		
		
		if($request->user()->type=="0"){
			if($request->user()->complete=="1"){
			return redirect ('/profile/'.Crypt::encrypt($request->user()->id));
		}
			return redirect ('/jobtype');
		}
        return $next($request);
    }
}
