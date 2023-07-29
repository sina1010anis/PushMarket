<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LockAcco
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seting = Seting::where('type' , 'lock_acco')->first();
        if($seting->status == 1 && !session()->has('lock_acco')){
            session()->put('lock_acco' , 1);
            return redirect()->route('acco.lock');
        }else{
            return $next($request);
        }

    }
}
