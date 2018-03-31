<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RegisterAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if($request->isMethod('post') && User::count() === 1)
        {
            auth()->user()->update([
                'is_admin' => true,
            ]);
        }

        return $response;
    }
}
