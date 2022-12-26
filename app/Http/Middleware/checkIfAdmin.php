<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIfAdmin
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
        
        $permissions=auth()->user()->role->permission;
        if(count($permissions)>0) 
        {
            foreach($permissions as $val)
            {
                if($val->permission=='create_role') return $next($request);
                else return redirect('/userNotAllowed');
            }
        }
        return redirect('/userNotAllowed');
        
    }
}
