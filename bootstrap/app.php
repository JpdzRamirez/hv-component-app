<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'CaptureSessionData' => \App\Http\Middleware\CaptureSessionData::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $redirected=false;
        $exceptions->render(function (\Throwable $exception) { // Asegúrate de usar \Throwable            
            // Verificar si hay una ModelNotFoundException anterior
            if ($exception->getPrevious() instanceof ModelNotFoundException) {
                return response()->view('pages.errors.404', [
                    'message' => $exception->getMessage(),
                ], 404);
            }                      
        });
    })->create();
