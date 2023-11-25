<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Passport\Passport;
use Closure;

class Authenticate extends Middleware
{
    /**
     * @param $request
     * @param  Closure  $next
     * @param ...$guards
     * @return JsonResponse|Closure
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards): JsonResponse|Closure|Response
    {
        if (!$request->expectsJson()) {
            return response()->json([__('exceptions.only_json_requests')], Response::HTTP_NOT_ACCEPTABLE);
        }
        if ($request->hasCookie(Passport::cookie())) {
            $token = $request->cookies->get(Passport::cookie());
            $request->headers->set("Authorization", "Bearer {$token}");
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            return url('/login');
        }
    }
}
