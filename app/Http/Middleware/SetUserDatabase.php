<?php 

namespace App\Http\Middleware;

use Closure;

class SetUserDatabase
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $userId = auth()->id();
            setDatabaseForUser($userId);
        }

        return $next($request);
    }
}
