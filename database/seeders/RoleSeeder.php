<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'vendor-product-orders',
            'vendor-product-list',
            'vendor-product-add',
            'vendor-product-edit',
            'vendor-product-delete',
        ];

        $role = Role::create(['name' => 'Vendor']);
        Role::create(['name' => 'User']);

        // $role->givePermissionTo(['product-list','product-create','product-edit','product-delete']);
        $role->syncPermissions($permissions);
    }
}
