<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // 1. Pengecualian CSRF agar login dari Android tidak mental
        $middleware->validateCsrfTokens(except: [
            '/api/*',
            '/login-proses',
            '/login',
            '/logout',
        ]);

        // 2. Trusted Proxies wajib untuk Ngrok agar HTTPS terbaca benar
        $middleware->trustProxies(at: '*');

        // 3. Agar session lebih stabil di WebView
        $middleware->statefulApi();

        // 4. DAFTARKAN ALIAS (Ini yang tadi hilang dan bikin error)
        $middleware->alias([
            'cek.ortu' => \App\Http\Middleware\CekOrtu::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();