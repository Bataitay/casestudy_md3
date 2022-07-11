<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\RoleHaspermission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('password')
        ]);
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@writer.com',
            'password' => bcrypt('password')
        ]);

        $admin_role = Role::create([
            'name' => 'Super Admin',
        ]);
        $writer_role = Role::create([
            'name' => 'writer',
        ]);
        $manager_role = Role::create([
            'name' => 'manager',
        ]);

        $groups     = ['Product', 'Customer', 'Category', 'Employee', 'Interface','Notifi', 'Role','Message'];
        $actions    = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                $permission = Permission::create([
                    'name' => $group . ' ' . $action,

                ]);
            }
        }
        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);
        $manager->assignRole($manager_role);

        $admin_role->givePermissionTo(Permission::all());

        $category = Category::create([
            'name' => 'Macbook',
        ]);
        $category = Category::create([
            'name' => 'Iphone',
        ]);
        $category = Category::create([
            'name' => 'Smart Watch',
        ]);
        $category = Category::create([
            'name' => 'ipad',
        ]);
        $category = Category::create([
            'name' => 'Airport',
        ]);
        DB::table('config')->insert([
            'pin' => '2815 mAh',
            'chip' => 'Apple A14 Bionic',
            'memory' => '500GB',
        ]);
        DB::table('config')->insert([
            'memory' => '125GB',
            'chip' => 'Apple A12 Bionic',
            'pin' => '3000 mAh',
        ]);
        DB::table('config')->insert([
            'chip' => 'Apple A13 Bionic',
            'pin' => '2515 mAh',
            'memory' => '225GB',
        ]);


    }
}
