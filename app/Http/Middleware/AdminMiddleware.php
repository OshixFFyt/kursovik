<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user instanceof User && $user->isAdmin()) {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Требуются права администратора.');
    }
}
