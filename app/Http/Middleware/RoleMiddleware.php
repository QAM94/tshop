<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $current_route_name = $request->route()->getName();
        $route_segments = explode('.', $current_route_name);

        $module_name = $route_segments[0];
        $module_method = isset($route_segments[1]) ? $route_segments[1] : '';


        /*if (auth()->user()->role == 'agent') {
            if ($module_name == 'customer_information') {


            } else if ($module_name == 'customers' && $module_method == 'add') {

            } else {

                return redirect()->route('customer_information');
            }
        } else {
            if ($module_name == 'customer_information') {
                return redirect()->route('dashboard');

            }
        }*/


        if (!in_array($module_name, $this->whiteListModuleNames()) && !in_array($module_method, $this->whiteListModuleMethods())) {

            if (in_array($module_method, $this->blacklistedModuleActions())) {

                $key = $module_method == 'view' ? 'view' : ($module_method == 'show' ? 'is_visible' : $module_method);

            } else {

                $key = 'is_visible';

            };

            $has_permission = hasRole($module_name, $key);

            if (!$has_permission) {
                abort(403);
            }
        }


        return $next($request);
    }

    public function whiteListModuleNames()
    {
        return [
            'dashboard',
            'customer_information'
        ];
    }

    public function whiteListModuleMethods()
    {
        return [
            'getinfo',
            'update-profile',
            'change-password',
            'profile_edit',
            'profile_update'
        ];
    }

    public function blacklistedModuleActions()
    {
        return [
            'add',
            'show',
            'view',
            'edit',
            'delete',
            'update'
        ];
    }
}
