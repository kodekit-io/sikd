<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Role
{
    protected  $adminAccess = [
        'user.index', 'user.list', 'user.add', 'user.create', 'user.edit', 'user.update', 'user.delete',
        'tkdd-posture.index', 'tkdd-posture.list', 'tkdd-posture.add', 'tkdd-posture.create', 'tkdd-posture.edit', 'tkdd-posture.update', 'tkdd-posture.delete',
        'apbd-posture.index', 'apbd-posture.list', 'apbd-posture.add', 'apbd-posture.create', 'apbd-posture.edit', 'apbd-posture.update', 'apbd-posture.delete',
        'account-mapping.index', 'account-mapping.list', 'account-mapping.add', 'account-mapping.create', 'account-mapping.edit', 'account-mapping.update', 'account-mapping.delete',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = session('userAttributes')['role'];
        $currentRouteName = Route::currentRouteName();
        View::share('role', $role);
        if (in_array($currentRouteName, $this->adminAccess)) {
            if ($role == 'admin') {
                return $next($request);
            } else {
                return redirect('home')->withErrors(['error' => 'You dont have access.']);
            }
        }

        return $next($request);
    }
}
