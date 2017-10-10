<?php

namespace App\Http\Middleware;

use App\Models\Doctor;
use Closure;
use Illuminate\Support\Facades\Auth;

class DoctorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'tenant')
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        if (empty($doctor)) {
            return abort(403);
        }

        return $next($request);
    }
}
