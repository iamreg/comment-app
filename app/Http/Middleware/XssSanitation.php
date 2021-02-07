<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XssSanitation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $request->all();


        array_walk_recursive($data, function(&$data) {
            $data = strip_tags($data);
        });

        $request->merge($data);

        return $next($request);
    }
}
