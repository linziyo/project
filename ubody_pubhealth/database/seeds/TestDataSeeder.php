<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appName = "双佳医疗";

        DB::beginTransaction();

        $admin = \App\Models\Admin::create(['name' => 'admin', 'password' => bcrypt('admin'), 'mobile' => '18565661810']);

        $tenant = \App\Models\Tenant::create(['name' => $appName]);

//
//        $community = \App\Community::create([
//            'name' => '研发二部',
//            'tenant_id' => $tenant['id'],
//            'population' => '1000',
//            'telephone' => '18565661810',
//            'address' => '粤海街道',
//            'image' => 'http://www.163.com',
//            'contract' => 'http://www.163.com'
//        ]);
//
//        $staff = \App\Staff::create([
//            'tenant_id' => $tenant['id'],
//            'name' => 'admin',
//            'community_id' => $community['id'],
//            'password' => bcrypt('admin'),
//            'mobile' => '18565661810'
//        ]);
//
//        $doctor = $community->doctors()->create([
//            'tenant_id' => $tenant['id'],
//            'mobile' => '18565661810',
//            'password' => bcrypt('12345678'),
//            'real_name' => '樊声波',
//            'community_id' => $community['id'],
//            'avatar' => '/images/default_avatar.jpg',
//            'duty' => '职务',
//            'title' => '职称',
//            'specialty' => '专业',
//            'skills' => '技能',
//            'working_time' => '1993年',
//            'consult' => '8:00-10:00',
//            'description' => '介绍介绍，这是个好医生，很有医德的'
//        ]);
//
//        $group = $community->groups()->create([
//            'tenant_id' => $tenant['id'],
//            'name' => '公共卫生医疗组',
//            'description' => '这是医组的介绍'
//        ]);
//
//        $group->doctors()->attach($doctor, ['is_leader' => true, 'tenant_id' => $tenant['id']]);
//
//        $package = $community->packages()->create([
//            'tenant_id' => $tenant['id'],
//            'name' => '基础服务包',
//            'community_id' => $community['id'],
//            'character' => '基础服务',
//            'requirement' => '基础服务',
//            'management_objective' => '基础服务',
//            'price' => 1000.00
//        ]);

        $tenantRole = new Role();
        $tenantRole->name = 'tenant';
        $tenantRole->display_name = 'Tenant User'; // optional
        $tenantRole->description = 'User is the owner of a given project'; // optional
        $tenantRole->save();

        $user = \App\Models\User::create(['tenant_id' => $tenant['id'], 'name' => 'admin', 'password' => bcrypt('admin')]);
        $user->attachRole($tenantRole);

//        $user->family()->create(['tenant_id' => $tenant['id'], 'name' => '范小燕', 'mobile' => '18682119738', 'relationship' => '妻子']);
//        $user->family()->create(['tenant_id' => $tenant['id'], 'name' => '樊依桐', 'relationship' => '儿子']);
//        $user->family()->create(['tenant_id' => $tenant['id'], 'name' => '樊梦瑶', 'relationship' => '女儿']);
//
//        $user->contracts()->create([
//            'tenant_id' => $tenant['id'],
//            'package_id' => $package['id'],
//            'group_id' => $group['id'],
//            'price' => $package['price'],
//            'start_time' => '2017-04-13',
//            'end_time' => '2018-04-12',
//            'status' => 0
//        ]);

        DB::commit();
    }
}
