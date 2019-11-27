<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTAuth extends BaseMiddleware
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
        if(! $token = $this->auth->setRequest($request)->getToken()){
            return response()->json([
                'status' => false,
                'message' => 'Token not provided'
            ], Response::HTTP_UNAUTHORIZED);
        }
        try {
            if(!$this->auth->authenticate($token))
            {
                return response()->json([
                    'status' => false,
                    'message'=> 'Unauthorized'
                ], Response::HTTP_UNAUTHORIZED);
            }

        }
        catch (TokenExpiredException $e){
            return response()->json([
                'status' => false,
                'message' => 'Token expired.'
            ], Response::HTTP_UNAUTHORIZED);
        }
        catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'Token is invalid'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
