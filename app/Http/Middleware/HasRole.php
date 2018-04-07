<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpKernel\Exception\HttpException;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $role
     * @return mixed
     */
    public function handle($request, \Closure $next, $role = null)
    {
        /** @var \App\User $user */
        $user = $request->user();

        if ($user && $user->roles->contains($role)) {
            return $next($request);
        }

        throw new HttpException(403);
    }
}
