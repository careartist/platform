<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class CheckAdminAddress
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
        $profile = Sentinel::getUser()->profile;
        if(!$profile->address)
        {
            return redirect()->route('admin.address.create');
        }
        return $next($request);
    }
}
