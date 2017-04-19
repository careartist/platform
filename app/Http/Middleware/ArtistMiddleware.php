<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class ArtistMiddleware
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first() && Sentinel::getUser()->roles()->first()->slug == 'artist')
                return $next($request);
        else
            return redirect()->route('home');
    }
}
