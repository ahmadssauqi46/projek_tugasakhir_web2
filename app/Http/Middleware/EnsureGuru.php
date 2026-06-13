<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureGuru
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('warning', 'Silakan login terlebih dahulu.');
        }

        if (Auth::user()->role !== 'guru') {
            abort(403, 'Akses admin hanya untuk guru.');
        }

        return $next($request);
    }
}
