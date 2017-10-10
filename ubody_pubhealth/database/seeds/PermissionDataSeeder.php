<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage-tenant', 'display_name' => '管理租户', 'description' => '管理租户']);
        Permission::create(['name' => 'manage-admin', 'display_name' => '管理管理员', 'description' => '管理管理员']);

        Permission::create(['name' => 'manage-community-hospital', 'display_name' => '管理社区医院', 'description' => '管理社区医院']);
        Permission::create(['name' => 'manage-community', 'display_name' => '管理社区', 'description' => '管理社区']);
        Permission::create(['name' => 'manage-role', 'display_name' => '管理角色', 'description' => '管理角色']);
        Permission::create(['name' => 'manage-permission', 'display_name' => '管理权限', 'description' => '管理权限']);
        Permission::create(['name' => 'manage-organization', 'display_name' => '管理机构', 'description' => '管理机构']);
        Permission::create(['name' => 'manage-user', 'display_name' => '管理用户', 'description' => '管理用户']);
        Permission::create(['name' => 'manage-doctor', 'display_name' => '管理医生', 'description' => '管理医生']);
        Permission::create(['name' => 'manage-group', 'display_name' => '管理医组', 'description' => '管理医组']);
        Permission::create(['name' => 'manage-package', 'display_name' => '管理服务包', 'description' => '管理服务包']);
        Permission::create(['name' => 'manage-article', 'display_name' => '管理文章', 'description' => '管理文章']);
        Permission::create(['name' => 'manage-archive', 'display_name' => '管理档案', 'description' => '管理档案']);
        Permission::create(['name' => 'manage-contract', 'display_name' => '管理签约', 'description' => '管理签约']);
    }
}
