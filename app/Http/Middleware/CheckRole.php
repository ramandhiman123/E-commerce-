<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
// use Spatie\Permission\Models\Role;
use App\Models\model_has_roles;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = User::where('id', Auth::user()->id)->with('roles')->first();
            $userrole = model_has_roles::get();
            $usrole = [];
            foreach ($userrole as $ur) {
                $usrole[] = $ur->role_id;
            }
            $alls = $user->roles;
            foreach ($alls as $new) {
                if (!empty($usrole) && in_array($new->id, $usrole)) {
                    return $next($request);
                }
                abort(403, 'unauthorized action');
            }
        }
        abort(401);
    }
}
