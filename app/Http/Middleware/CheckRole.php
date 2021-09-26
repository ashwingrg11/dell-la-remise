<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckRole
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {
        $role_name = Auth::user()->role;

        if (in_array($role_name, $role)) {
            return $next($request);
        } else {
            return redirect()->route('offer-claims.index');
        }
    }
}
