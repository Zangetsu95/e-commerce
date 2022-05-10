<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    /**
     * If the user is logged in, then the user can access the page. If not, then the user will be
     * redirected to the login page
     * @param {Request} request - The incoming request.
     * @param {Closure} next - The next middleware to be executed.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        /* This is checking if the user is logged in. If the user is logged in, then the user can
        access the page. If not, then the user will be redirected to the login page. */
        if (Auth::check()) {
            /* This is setting the user to be online for 30 seconds. */
            $activity = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online' . Auth::user()->id, true, $activity);
            /* This is updating the user's last seen time to the current time. */
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        /* This is checking if the user is logged in and authenticated. If the user is logged in and
        authenticated, then the user can access the page. If not, then the user will be redirected
        to the login page. */
        //if this user is log or not && user authenticated
        if (Auth::check() && Auth::user()) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
