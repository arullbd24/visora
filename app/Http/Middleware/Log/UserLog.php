<?php

namespace App\Http\Middleware\Log;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Log\UserLog as LogUser;

class UserLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Record log into the log_user table
            LogUser::create([
                'id' => Str::uuid(), // Generate UUID for the log entry
                'id_user' => Auth::user()->id_user, // Get authenticated user ID
                'action' => json_encode([
                    'method' => $request->method(),
                    'url' => $request->fullUrl(),
                    'payload' => $request->all(), // Request data
                ]), // Log action in JSON format
                'method' => $request->method(), // Request method (GET, POST, etc.)
                'ip_address' => $request->ip(), // User IP address
                'user_agent' => $request->userAgent(), // Browser info
            ]);
        }
        
        return $next($request);
    }
}
