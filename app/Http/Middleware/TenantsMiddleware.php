<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Facades\Tenant as Tenants;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain',$host)->first();
        if (empty($tenant)) {
            Tenants::switchToDefault();
        } else {
            Tenants::switchToTenant($tenant);
        }

        return $next($request);
    }
}
