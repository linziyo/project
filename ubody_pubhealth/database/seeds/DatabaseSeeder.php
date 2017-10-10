<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(PermissionDataSeeder::class);
//        $this->call(RegionDataSeeder::class);
//        $this->call(TestDataSeeder::class);

        DB::transaction(function () {
            $id = DB::table('admins')->insertGetId(['name' => 'admin', 'password' => bcrypt('admin')]);
            $doctorRoleId = DB::table('roles')->insertGetId(['name' => 'doctor', 'display_name' => 'doctor role']);
            $staffRoleId = DB::table('roles')->insertGetId(['name' => 'staff', 'display_name' => 'staff role']);
            $tenantId = DB::table('tenants')->insertGetId(['name' => '双佳医疗', 'full_name' => '深圳市双佳医疗科技有限公司', 'contact_name' => '陈鹰', 'phone_number' => '400-048-8836']);

            $communityHospitalId = DB::table('community_hospitals')->insertGetId(['name' => '双佳医院', 'tenant_id' => $tenantId]);
            // 创建两个社区
            $manufactureId = DB::table('communities')->insertGetId(['name' => '制造中心', 'code' => '000000000001', 'population' => 150, 'telephone' => '0755-33556301', 'address' => '深圳市宝安区石岩街道办塘头大道1号中运泰科技园8栋6层', 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            $developmentId = DB::table('communities')->insertGetId(['name' => '研发中心', 'code' => '000000000002', 'population' => 25, 'telephone' => '0755-81795623', 'address' => '深圳市南山区科技园北区清华信息港科研楼6楼617', 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);

            DB::table('archive_code_increments')->insert(
                ['community_id' => $manufactureId, 'code' => 0],
                ['community_id' => $developmentId, 'code' => 0]
            );

            $zhanghuaqiang_id = DB::table('users')->insertGetId(['name' => 'zhanghuaqiang', 'mobile' => '13692270502', 'password' => bcrypt('13692270502'), 'real_name' => '张华强', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $guolei_id = DB::table('users')->insertGetId(['name' => 'guolei', 'mobile' => '13683986963', 'password' => bcrypt('13683986963'), 'real_name' => '郭磊', 'mobile_verified' => true, 'tenant_id' => $tenantId]);

            $qidongsheng_id = DB::table('users')->insertGetId(['name' => 'qidongsheng', 'mobile' => '13603087175', 'password' => bcrypt('13603087175'), 'real_name' => '祁冬生', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $liuxiaoyang_id = DB::table('users')->insertGetId(['name' => 'liuxiaoyang', 'mobile' => '13380789219', 'password' => bcrypt('13380789219'), 'real_name' => '刘晓阳', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $zhongqiulan_id = DB::table('users')->insertGetId(['name' => 'zhongqiulan', 'mobile' => '15678320383', 'password' => bcrypt('15678320383'), 'real_name' => '钟秋兰', 'mobile_verified' => true, 'tenant_id' => $tenantId]);

            $fanshengbo_id = DB::table('users')->insertGetId(['name' => 'fanshengbo', 'mobile' => '18565661810', 'password' => bcrypt('18565661810'), 'real_name' => '樊声波', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $songzhiwen_id = DB::table('users')->insertGetId(['name' => 'songzhiwen', 'mobile' => '13113011451', 'password' => bcrypt('13113011451'), 'real_name' => '宋志文', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $wanjinliang_id = DB::table('users')->insertGetId(['name' => 'wanjinliang', 'mobile' => '18126525086', 'password' => bcrypt('18126525086'), 'real_name' => '万金良', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $luzilin_id = DB::table('users')->insertGetId(['name' => 'luzilin', 'mobile' => '18320815118', 'password' => bcrypt('18320815118'), 'real_name' => '卢子林', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $weijialei_id = DB::table('users')->insertGetId(['name' => 'weijialei', 'mobile' => '13370185092', 'password' => bcrypt('13370185092'), 'real_name' => '韦佳雷', 'mobile_verified' => true, 'tenant_id' => $tenantId]);
            $duanhongbing_id = DB::table('users')->insertGetId(['name' => 'duanhongbing', 'mobile' => '18719444027', 'password' => bcrypt('18719444027'), 'real_name' => '段红兵', 'mobile_verified' => true, 'tenant_id' => $tenantId]);


            DB::table('staff')->insertGetId(['user_id' => $zhanghuaqiang_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $guolei_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);

            DB::table('staff')->insertGetId(['user_id' => $fanshengbo_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $songzhiwen_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $wanjinliang_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $luzilin_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $weijialei_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);
            DB::table('staff')->insertGetId(['user_id' => $duanhongbing_id, 'tenant_id' => $tenantId, 'community_hospital_id' => $communityHospitalId]);

            $qidongsheng_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $qidongsheng_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '专科医生']);
            $liuxiaoyang_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $liuxiaoyang_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);
            $zhongqiulan_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $zhongqiulan_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '健康管理师']);

            $fanshengbo_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $fanshengbo_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '专科医生']);
            $songzhiwen_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $songzhiwen_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);
            $wanjinliang_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $wanjinliang_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);
            $luzilin_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $luzilin_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);
            $weijialei_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $weijialei_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);
            $duanhongbing_doctor_id = DB::table('doctors')->insertGetId(['user_id' => $duanhongbing_id, 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId, 'skills' => '全科医生']);


            $groupId = DB::table('groups')->insertGetId(['name' => '第一小组', 'community_hospital_id' => $communityHospitalId, 'tenant_id' => $tenantId]);
            DB::table('group_doctors')->insert([
                ['group_id' => $groupId, 'doctor_id' => $qidongsheng_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $liuxiaoyang_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $zhongqiulan_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $fanshengbo_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $songzhiwen_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $wanjinliang_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $luzilin_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $weijialei_doctor_id, 'tenant_id' => $tenantId],
                ['group_id' => $groupId, 'doctor_id' => $duanhongbing_doctor_id, 'tenant_id' => $tenantId]
            ]);

            DB::table('role_user')->insert([
                ['user_id' => $zhanghuaqiang_id, 'role_id' => $staffRoleId],
                ['user_id' => $guolei_id, 'role_id' => $staffRoleId],
                ['user_id' => $qidongsheng_id, 'role_id' => $doctorRoleId],
                ['user_id' => $liuxiaoyang_id, 'role_id' => $doctorRoleId],
                ['user_id' => $zhongqiulan_id, 'role_id' => $doctorRoleId],
                ['user_id' => $fanshengbo_id, 'role_id' => $doctorRoleId],
                ['user_id' => $songzhiwen_id, 'role_id' => $doctorRoleId],
                ['user_id' => $wanjinliang_id, 'role_id' => $doctorRoleId],
                ['user_id' => $luzilin_id, 'role_id' => $doctorRoleId],
                ['user_id' => $weijialei_id, 'role_id' => $doctorRoleId],
                ['user_id' => $duanhongbing_id, 'role_id' => $doctorRoleId],
                ['user_id' => $fanshengbo_id, 'role_id' => $staffRoleId],
                ['user_id' => $songzhiwen_id, 'role_id' => $staffRoleId],
                ['user_id' => $wanjinliang_id, 'role_id' => $staffRoleId],
                ['user_id' => $luzilin_id, 'role_id' => $staffRoleId],
                ['user_id' => $weijialei_id, 'role_id' => $staffRoleId],
                ['user_id' => $duanhongbing_id, 'role_id' => $staffRoleId]
            ]);
        });
    }
}