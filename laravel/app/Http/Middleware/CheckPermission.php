<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, string $permission)
    {
        $user = auth()->user();

        if (!$user || !$user->hasPermission($permission)) {
            throw new AuthorizationException("Нет доступа: {$permission}");
        }

        return $next($request);
    }
}
