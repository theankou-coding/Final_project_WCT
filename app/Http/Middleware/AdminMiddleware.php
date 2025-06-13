<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $decodedUser = $request->attributes->get('user'); // Added by jwt.auth middleware
        if (!$decodedUser) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        // Load user from DB using sub (user id)
        $user = User::find($decodedUser->sub);
        if (!$user || $user->role !== 'admin') {
            return response()->json(['message' => 'Access denied. Admins only.'], 403);
        }

        // Optionally attach user to request for further use
        $request->attributes->add(['user' => $user]);

        return $next($request);
    }
}
