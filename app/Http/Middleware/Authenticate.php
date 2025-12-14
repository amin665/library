<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null;
        }

        // If the request is for the admin area, redirect to the admin login route.
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        // Prefer the named 'login' route if it exists, otherwise fall back to admin login.
        if (Route::has('login')) {
            return route('login');
        }

        return route('admin.login');
    }
}
