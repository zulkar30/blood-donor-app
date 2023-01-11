<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\ManagementAccess\Role;

class AuthGates
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
        // Ambil semua data user yang login
        $user = \Auth::user();

        // Cek apakah sistem hidup atau tidak
        // Cek apakah user aktif atau tidak
        if(!app()->runningInConsole() && $user)
        {
            $roles              = Role::with('permission')->get();
            $permissionsArray   = [];

            // nested loop
            // looping for role ( where table role )
            foreach ($roles as $role){
                // looping for permission ( where table permnission_role )
                foreach ($role->permission as $permissions){
                    $permissionsArray[$permissions->name][] = $role->id;
                }
            }

            // check user role
            foreach ($permissionsArray as $name => $roles) {
                Gate::define($name, function(\App\Models\User $user)
                use ($roles) {
                    return count(array_intersect($user->role->pluck('id')
                    ->toArray(), $roles)) > 0;
                });
            }
        }
        return $next($request);
    }
}
