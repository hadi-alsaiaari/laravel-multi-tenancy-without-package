<?php

namespace Database\Seeders\Landlord;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = [
            ['name'=> 'tenant1', 'domain'=>'app1.new-app-breeze.test' , 'database'=>'livewires'],
            ['name'=> 'tenant2', 'domain'=>'app2.new-app-breeze.test' , 'database'=>'jestream'],
        ];

        Tenant::insert($tenant);
    }
}
