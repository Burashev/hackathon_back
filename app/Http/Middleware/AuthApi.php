<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::query()->where('api_token', $request->bearerToken())->first();
        if ($user) {
            Auth::login($user);
            return $next($request);
        }

        $response = [
            'success' => false,
            'message' => [
                'error' => 'Unauthorized'
            ],
        ];

        return response()->json($response, 401);
    }
}
