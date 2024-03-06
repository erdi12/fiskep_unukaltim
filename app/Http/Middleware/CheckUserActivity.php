<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Periksa waktu aktivitas terakhir pengguna
            $lastActivity = Auth::user()->last_activity;

            // Jika waktu aktivitas terakhir melebihi batas waktu (misalnya 30 menit), logout pengguna
            if (now()->diffInMinutes($lastActivity) > 30) {
                Auth::logout();
                return redirect('/login')->with('session_expired', 'Session has expired. Please log in again.');
            }

            // Update waktu aktivitas terakhir setiap kali pengguna melakukan aktivitas
            Auth::user()->update(['last_activity' => now()]);
        }

        return $next($request);
    }
}
