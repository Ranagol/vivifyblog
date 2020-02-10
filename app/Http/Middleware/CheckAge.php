<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        if ($request->age < 18) {//ako je user ispod 18 godina, ne sme da prodje filter CheckAge. Mora da app/Http/Kernel
            return response(view('register.forbidden'));//Ovo ce aktivirati forbidden.blade.php sa odgovarajućom porukom tipa 'if you are not 18, fuck you'
        }
        return $next($request);//if the user is older than 18, he can get what he requested
    }
}
