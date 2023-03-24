<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illumintae\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            //roles akan mengubah  string yang dipisah dengan koma menjadi item 
            if (in_array($request->user()->role, $role)) {
                return $next($request);
            }else {
                return redirect()->back();
            }
    }
}
