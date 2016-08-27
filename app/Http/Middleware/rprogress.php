<?php

namespace App\Http\Middleware;

use Closure;
use Crypt;
class rprogress
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
		if($request->user()->progress=="2"){
			//$request->session()->flash('message','This is wh')
			return redirect('appliedfor/return/'.$request->user()->pos_id.'/'.$request->user()->jobcat);
		}
		if($request->user()->progress=="3"){
			return redirect('/contact');
		}
		if($request->user()->progress=="4"){
			return redirect('/education');
		}
		
		if($request->user()->progress=="5"){
			return redirect('/profile/'.Crypt::encrypt($request->user()->id));
		
		}
		else{
		if($request->user()->complete=="1"){
			return redirect('/profile/'.Crypt::encrypt($request->user()->id));
		}
		}
		
        return $next($request);
    }
}
