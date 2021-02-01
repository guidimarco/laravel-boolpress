<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckToken
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
        $auth_token = $request -> header('authorization');
        // dd($auth_token);

        // check: token exists?
        if (empty($auth_token)) {
            return response() -> json([
                'success' => false,
                'error' => 'Api Token mancante'
            ]);
        }

        // extract token
        $input_token = substr($auth_token, 7);

        // user <-> token
        $user = User::where('api_token', $input_token) -> first();
        // dd($user);

        // check: user exists?
        if (!$user) {
            return response() -> json([
                'success' => false,
                'error' => 'Api Token sbagliato'
            ]);
        }

        // end middleware -> go to route
        return $next($request);
    }
}
