<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AlreadyLogedIn;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\CheckUserPermission;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
            $middleware->appendToGroup('AlreadyLogedIn', [
            AlreadyLogedIn::class,
            
        ]);
              $middleware->appendToGroup('isLoggedIn', [
            LoginCheck::class,
            
        ]);
 $middleware->alias([
            'permission' => CheckUserPermission::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
