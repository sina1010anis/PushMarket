<?php

use App\Http\Middleware\LockAcco;
use App\Http\Middleware\LockCashire;
use App\Http\Middleware\LockStore;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'lock_cashire' => LockCashire::class,
            'lock_acco' => LockAcco::class,
            'lock_store' => LockStore::class,
            'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            '/store/store/new',
            '/store/store/delete',
            '/store/exit/delete',
            '/store/exit/new',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
