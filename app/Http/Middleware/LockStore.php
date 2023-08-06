<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LockStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seting = Seting::where('type' , 'lock_store')->first();
        if($seting->status == 1 && !session()->has('lock_store')){
            session()->put('lock_store' , 1);
            return redirect()->route('store.lock.page');
        }else{
            return $next($request);
        }

    }
}
