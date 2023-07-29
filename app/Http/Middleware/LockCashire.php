<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LockCashire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seting = Seting::where('type' , 'lock_cashire')->first();
        if($seting->status == 1 && !session()->has('lock_cashire')){
            session()->put('lock_cashire' , 1);
            return redirect()->route('cashier.lock');
        }else{
            return $next($request);
        }

    }
}
