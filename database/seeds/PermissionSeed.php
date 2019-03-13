<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'product_access',],
            ['id' => 18, 'title' => 'productdetail_access',],
            ['id' => 19, 'title' => 'productdetail_create',],
            ['id' => 20, 'title' => 'productdetail_edit',],
            ['id' => 21, 'title' => 'productdetail_view',],
            ['id' => 22, 'title' => 'productdetail_delete',],
            ['id' => 38, 'title' => 'vendor_access',],
            ['id' => 39, 'title' => 'vendor_create',],
            ['id' => 40, 'title' => 'vendor_edit',],
            ['id' => 41, 'title' => 'vendor_view',],
            ['id' => 42, 'title' => 'vendor_delete',],
            ['id' => 58, 'title' => 'productprice_access',],
            ['id' => 59, 'title' => 'productprice_create',],
            ['id' => 60, 'title' => 'productprice_edit',],
            ['id' => 61, 'title' => 'productprice_view',],
            ['id' => 62, 'title' => 'productprice_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
