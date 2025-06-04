<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Library\TokenHelper;
use Livewire\Livewire;

// sign/d/files/eUxaYUdiUzRXVFVKd3hUSWFkSnlEUzdKblp2aFZXZVlnWTRJb0plNWVySkFld1FzUzVFcmxxdTRGVXBwQnB4OQ==

class PlaceSignCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->route('token');
            $responseCheckToken = TokenHelper::checkTokenUserSignatureInitial($token, Auth::user()->id_user);
            
            if (!$responseCheckToken->status) {
                $previousUrl = session()->get('_previous')['url'];
                if (Str::contains($previousUrl, "sign/d/files")) {
                    return redirect()->route('documents.main');
                }
                return redirect()->back();
            }
            
            return $next($request);
            
        } catch (\Exception $e) {
            return redirect()->route('dashboard.main');
        }
    }
}
