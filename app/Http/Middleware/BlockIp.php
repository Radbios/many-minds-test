<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class BlockIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        $attempts = Cache::get($ip, 0);
        if ($attempts >= 3) {
            abort(403, 'Ação não autorizada: Você fez 3 tentativas de login. Seu IP será bloqueado por 60 segundos.');
        }
        $attempts += 1;
        Cache::put($ip, $attempts, 60);

        return $next($request);
    }
}
