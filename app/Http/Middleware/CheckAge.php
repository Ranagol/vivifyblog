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
            return response(view('register.forbidden'));//trazimo sa control + p u visual studi. Inace, ovo ce aktivirati forbidden.blade.php
        }
        return $next($request);
    }
}
