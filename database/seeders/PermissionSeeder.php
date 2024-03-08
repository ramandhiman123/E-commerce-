<?php

namespace Database\Seeders;
use App\Models\Roles;
// use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   


        // $permissions =[
        //     'name' => 'add_new_vender',
        //     'remove_vender',
        //      'view_user_data',
        // ];



    
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        //  Permission::create(['name' => 'new_vender_add']);
        //  Permission::create(['name' => 'vender_remove']);
        // //  Permission::create(['name' => 'view_product_list']);
        //  Permission::create(['name' => 'add_products']);
        //  Permission::create(['name' => 'delete_products']);
  

        //  $role = Roles::create(['name' => 'vender']);
        //  $role->givePermissionTo('view_product_list');
        //  $role->givePermissionTo('add_products');
        // $role = Roles::find('vender');
        // $permission = Permission::find('view_product_list');
        // $role->syncPermissions($permission);
        // $role->syncPermissions();

        // Permission::create(['name' => 'edit articles']);
        // Permission::create(['name' => 'delete articles']);
        // Permission::create(['name' => 'publish articles']);
        // Permission::create(['name' => 'unpublish articles']);
        
    //  Permission::create($permissions);
    $permissions = [
        // 'category-view',
        // 'category-create',
        // 'category-update',
        // 'category-delete',
        // 'vendor-product-orders'
        'all-orders'
        // 'role-list',
        // 'role-create',
        // 'role-assin-permission',
        // 'role-update-permission',
        // 'role-delete',
        // 'vendor-product-list',
        // 'vendor-product-add',
        // 'vendor-product-edit',
        // 'vendor-product-delete',
        // 'user-create',
        // 'user-list',
        // 'user-delete',
        // 'user-assign-role',
        // 'user-update-role',
     ];

     foreach ($permissions as $permission) {
       Permission::create(['name' => $permission]);
     }
 }
    }

