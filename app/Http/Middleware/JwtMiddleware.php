<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json([
                    'message' => 'Token is Invalid',
                    'status'=> false,
                    'code'=> 401
                     ], 401);
                // return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                // return response()->json(['status' => 'Token is Expired']);
                return response()->json([
                    'message' => 'Token is Expired',
                    'status'=> false,
                    'code'=> 403
                     ], 403);
            }else{
                // return response()->json(['status' => 'Authorization Token not found']);
                return response()->json([
                    'message' => 'Authorization Token not found',
                    'status'=> false,
                    'code'=> 404
                     ], 404);
            }
        }
        return $next($request);
    }
}