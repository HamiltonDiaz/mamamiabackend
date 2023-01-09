<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        return $next($request)
            ->header("Access-Control-Allow-Credentials", true)
            //Headers de la petición
            ->header("Access-Control-Allow-Headers", "Origin, Content-Type,  Authorization, Accept, X-Requested-With, X-Token-Auth, X-CSRF-TOKEN")
            //Url a la que se le dará acceso en las peticiones
            ->header("Access-Control-Allow-Origin", "http://localhost:3000")
            //Métodos que a los que se da acceso
            ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS, PATCH")

            ->header("Content-Type", "application/json, application/x-wwww-form-urlencoded, multipart/formdata")
            ->header("Accept", "application/json, multipart/form-data")
            ->header("User-agent", "*")
            ->header("Access-Control-Expose-Headers", "*")
            ;
    }
}
