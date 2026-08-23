<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WakilDekanMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $jabatan
    ): Response {
        $user = auth('dekan')->user();

        // Belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Jika jabatan sudah sesuai, lanjutkan
        if ($user->jabatan === $jabatan) {
            return $next($request);
        }

        // Jika jabatan tidak sesuai, arahkan ke dashboard masing-masing
        if ($user->jabatan === 'wakil_dekan') {
            return redirect()->route('wakil_dekan.dashboard');
        }

        if ($user->jabatan === 'dekan') {
            return redirect()->route('dekan.dashboard');
        }

        // Jika jabatan tidak dikenali
        return redirect()->route('login');
    }
}