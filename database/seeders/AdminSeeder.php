<?php

namespace Database\Seeders;
use App\Models\User;
use Spatie\Permission\Models\Role;
// use App\Models\Roles;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'email_verified_at' => now(),
            'password' =>  Hash::make('password'),
        ])->assignRole('Admin');
        // User::create([
        //     'name' => 'seller',
        //     'email' => 'seller123@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' =>  Hash::make('12345'),
        // ]);
        // $user = User::create([
        //     'name' => 'admin', 
        //     'email' => 'admin123@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' =>  Hash::make('12345678'),
        // ])->assignRole('Admin');
    
        // $role = Role::create(['name' => 'Vendor']);
        //  $role = Role::create(['name' => 'Vendor']);
        //    Role::create(['name' => 'User']);

        // $permissions = Permission::get();
        // $role->syncPermissions($permissions);
     
        // $user->assignRole($role);
        // $permissions = [
        //     'role-list',
        //     'role-create',
        //     'role-edit',
        //     'role-delete',
        //     'product-list',
        //     'product-create',
        //     'product-edit',
        //     'product-delete'
        //  ];
      
    }
    
   
    }

