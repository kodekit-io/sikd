<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Role
{
    protected  $adminAccess = ['admin'];
    protected $homeAccess = ['home'];
    protected $level1Access = ['level-1'];
    protected $level2Access = ['level-2'];
    protected $level3Access = ['level-3'];
    protected $roles = ['admin', 'home', 'level-1', 'level-2', 'level-3'];

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
        $userRoles = explode(',', $role);
        View::share('roles', $userRoles);
        $currentRouteName = Route::currentRouteName();

//        $roleName = 'admin';
//        $routeAccess = $this->getAccessName($roleName);
//        if (in_array($currentRouteName, $this->{$routeAccess})) {
//            if (in_array($roleName, $userRoles)) {
//                return $next($request);
//            } else {
//                return redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.']);
//            }
//        }
//
//        $roleName = 'home';
//        $routeAccess = $this->getAccessName($roleName);
//        if (in_array($currentRouteName, $this->{$routeAccess})) {
//            if (in_array($roleName, $userRoles)) {
//                return $next($request);
//            } else {
//                return redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.']);
//            }
//        }
//
//        $roleName = 'level-1';
//        $routeAccess = $this->getAccessName($roleName);
//        if (in_array($currentRouteName, $this->{$routeAccess})) {
//            if (in_array($roleName, $userRoles)) {
//                return $next($request);
//            } else {
//                return redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.']);
//            }
//        }
//
//        $roleName = 'level-2';
//        $routeAccess = $this->getAccessName($roleName);
//        if (in_array($currentRouteName, $this->{$routeAccess})) {
//            if (in_array($roleName, $userRoles)) {
//                return $next($request);
//            } else {
//                return redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.']);
//            }
//        }
//
//        $roleName = 'level-3';
//        $routeAccess = $this->getAccessName($roleName);
//        if (in_array($currentRouteName, $this->{$routeAccess})) {
//            if (in_array($roleName, $userRoles)) {
//                return $next($request);
//            } else {
//                return redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.']);
//            }
//        }

        foreach ($this->roles as $roleName) {
            $checkedRole = $this->checkRole($roleName, $userRoles, $next, $request);
            if ($checkedRole[0]) {
                return $checkedRole[1];
            }
        }

        return $next($request);
    }

    private function checkRole($roleName, $roles, $next, $request)
    {
        $currentRouteName = Route::currentRouteName();
        $routeAccess = $this->getAccessName($roleName);
        if (in_array($currentRouteName, $this->{$routeAccess})) {
            if (in_array($roleName, $roles)) {
                return [true, $next($request)];
            } else {
                return [true, redirect('home')->withErrors(['error' => 'You dont have ' . $roleName . ' access.'])];
            }
        }
        return [false, ''];
    }

    private function getAccessName($roleName)
    {
        $accessName = str_replace('-', '', $roleName);
        return $accessName . 'Access';
    }
}
