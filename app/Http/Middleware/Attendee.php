<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Attendee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array(Auth::user()->roleOfUser, ['attendee', 'organizer'])) {
            return $next($request);
        }
        // if (Auth::user()->roleOfUser == 'attendee' || Auth::user()->roleOfUser == 'organizer') {
        //     return $next($request);
        // }
        return redirect('/');
    }
}
