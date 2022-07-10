<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'user_view', 'display_name' => 'User View', 'group_name' => 'user'],
            ['name' => 'user_create', 'display_name' => 'User Create', 'group_name' => 'user'],
            ['name' => 'user_store', 'display_name' => 'User Store', 'group_name' => 'user'],
            ['name' => 'user_edit', 'display_name' => 'User Edit', 'group_name' => 'user'],
            ['name' => 'user_update', 'display_name' => 'User Update', 'group_name' => 'user'],
            ['name' => 'user_delete', 'display_name' => 'User Delete', 'group_name' => 'user'],
            ['name' => 'user_show', 'display_name' => 'User Show', 'group_name' => 'user'],

            ['name' => 'role_view', 'display_name' => 'Role View', 'group_name' => 'role'],
            ['name' => 'role_create', 'display_name' => 'Role Create', 'group_name' => 'role'],
            ['name' => 'role_store', 'display_name' => 'Role Store', 'group_name' => 'role'],
            ['name' => 'role_edit', 'display_name' => 'Role Edit', 'group_name' => 'role'],
            ['name' => 'role_update', 'display_name' => 'Role Update', 'group_name' => 'role'],
            ['name' => 'role_delete', 'display_name' => 'Role Delete', 'group_name' => 'role'],
            ['name' => 'role_show', 'display_name' => 'Role Show', 'group_name' => 'role'],

            ['name' => 'product_view', 'display_name' => 'Product View', 'group_name' => 'product'],
            ['name' => 'product_create', 'display_name' => 'Product Create', 'group_name' => 'product'],
            ['name' => 'product_store', 'display_name' => 'Product Store', 'group_name' => 'product'],
            ['name' => 'product_edit', 'display_name' => 'Product Edit', 'group_name' => 'product'],
            ['name' => 'product_update', 'display_name' => 'Product Update', 'group_name' => 'product'],
            ['name' => 'product_delete', 'display_name' => 'Product Delete', 'group_name' => 'product'],
            ['name' => 'product_show', 'display_name' => 'Product Show', 'group_name' => 'product'],

            ['name' => 'category_view', 'display_name' => 'Category View', 'group_name' => 'category'],
            ['name' => 'category_create', 'display_name' => 'Category Create', 'group_name' => 'category'],
            ['name' => 'category_store', 'display_name' => 'Category Store', 'group_name' => 'category'],
            ['name' => 'category_edit', 'display_name' => 'Category Edit', 'group_name' => 'category'],
            ['name' => 'category_update', 'display_name' => 'Category Update', 'group_name' => 'category'],
            ['name' => 'category_delete', 'display_name' => 'Category Delete', 'group_name' => 'category'],
            ['name' => 'category_show', 'display_name' => 'Category Show', 'group_name' => 'category']
        ]);
    }
}
