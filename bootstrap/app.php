<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'admin/setting/*',
            'admin/news/*',
            'admin/kajian/*',
            'admin/gallery/*',
            'admin/profile/*',
            'admin/profile',
            'admin/ortom/*',
            'admin/ortom',
            'admin/user/*',
            'message',
            'subscribe',
            'user/kajian/*',
            'user/profile',
            '/admin/mui-kecamatan/upload',
            '/admin/komisi/upload'

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
