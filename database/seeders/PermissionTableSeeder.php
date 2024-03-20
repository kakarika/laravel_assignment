<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'dashboard',
                'guard_name' => 'web',
            ],
            [
                'name' => 'article_list',
                'guard_name' => 'web',
            ],
            [
                'name' => 'article_create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'article_edit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'article_delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'product_list',
                'guard_name' => 'web',
            ],
            [
                'name' => 'product_create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'product_edit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'product_delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission_list',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission_create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission_edit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'permission_delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role_list',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role_create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role_edit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role_delete',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user_list',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user_create',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user_edit',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user_delete',
                'guard_name' => 'web',
            ],
        ];

        Permission::insert($data);
    }
}
