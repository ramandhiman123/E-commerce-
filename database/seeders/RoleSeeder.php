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
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
         ];
    // $role = Role::create(['name' => 'Admin']);
       $role =   Role::create(['name' => 'Vendor']);
        Role::create(['name' => 'user']);

        // $role->givePermissionTo(['product-list','product-create','product-edit','product-delete']);
        $role->syncPermissions($permissions);
    }
}
