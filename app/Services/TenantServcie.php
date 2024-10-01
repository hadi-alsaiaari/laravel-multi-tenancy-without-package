<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantServcie
{
    private $tenant;
    private $domain;
    private $database;

    public function switchToTenant(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            // throw error or tenant class 
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }
        DB::purge('landlord');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database', $tenant->database);
        $this->tenant = $tenant;
        $this->domain = $tenant->domain;
        $this->database = $tenant->database;
        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    }

    public function switchToDefault()
    {
        DB::purge('landlord');
        DB::purge('tenant');
        DB::connection('landlord')->reconnect();
        DB::setDefaultConnection('landlord');
    }

    public function getTenant(){
        return $this->tenant;
    }
}
