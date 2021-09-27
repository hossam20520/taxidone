<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class RolesClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = User::where("phone" , $request->phone)->first();
        $user->roles;
        if ($user->roles[0]->title !== "Client"){
  
  
          return response()->json([
              'message' => "You are not a Client",
              'status'=> false,
              'code'=> 404 
               ], 404 );
  
  
        }
     
        return $next($request);
    }
}