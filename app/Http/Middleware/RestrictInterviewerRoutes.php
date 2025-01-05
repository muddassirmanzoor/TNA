<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestrictInterviewerRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;

        // If user is an interviewer, restrict access to all routes except interviewer-teacher-list
        if ($role == 'interviewer') {
            $allowedRoute = 'interviewer-teacher-list'; // Allow only this route

            // Check if the current route is not in the allowed route
            if ($request->route()->getName() !== $allowedRoute) {
                return redirect()->route($allowedRoute); // Redirect to allowed route
            }
        }elseif ($role == 'invigilator') {
            $allowedRoute = 'invigilator-teacher-list'; // Allow only this route

            // Check if the current route is not in the allowed route
            if ($request->route()->getName() !== $allowedRoute) {
                return redirect()->route($allowedRoute); // Redirect to allowed route
            }
        }
        return $next($request);
    }
}
