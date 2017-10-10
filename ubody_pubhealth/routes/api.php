<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('archives/today', 'ArchiveController@total');
    Route::resource('archives', 'ArchiveController');
    Route::any('contracts/info', 'ContractController@create');
    Route::resource('contracts', 'ContractController');
    //老年人生活自理能力评估
    Route::post('visits/selfcare_ability', 'VisitController@selfcare_ability_store');
    Route::any('visits/selfcare_ability/{id}', 'VisitController@selfcare_ability_show');
    Route::post('visits/selfcare_ability/{id}', 'VisitController@selfcare_ability_update');
    //高血压随访
    Route::post('visits/hypertensions', 'VisitController@hypertension_store');
    Route::get('visits/hypertensions/{id}', 'VisitController@hypertension_show');
    Route::post('visits/hypertensions/{id}', 'VisitController@hypertension_update');
    //二型糖尿病随访
    Route::post('visits/diabetes', 'VisitController@diabete_store');
    Route::get('visits/diabetes/{id}', 'VisitController@diabete_show');
    Route::post('visits/diabetes/{id}', 'VisitController@diabete_update');
    //重性精神疾病患者随访
    Route::post('visits/mental_patients', 'VisitController@mental_patient_store');
    Route::get('visits/mental_patients/{id}', 'VisitController@mental_patient_show');
    Route::post('visits/mental_patients/{id}', 'VisitController@mental_patient_update');
    //肺结核患者第一次入户随访
    Route::post('visits/tuberculosis_first_records', 'VisitController@tuberculosis_first_record_store');
    Route::get('visits/tuberculosis_first_records/{id}', 'VisitController@tuberculosis_first_record_show');
    Route::post('visits/tuberculosis_first_records/{id}', 'VisitController@tuberculosis_first_record_update');
    //用户多次肺结核随访
    Route::post('visits/tuberculosis_patients', 'VisitController@tuberculosis_patient_store');
    Route::get('visits/tuberculosis_patients/{id}', 'VisitController@tuberculosis_patient_show');
    Route::post('visits/tuberculosis_patients/{id}', 'VisitController@tuberculosis_patient_update');
    //用户中医体质随访
    Route::post('visits/chinese_medicines', 'VisitController@chinese_medicine_store');
    Route::get('visits/chinese_medicines/{id}', 'VisitController@chinese_medicine_show');
    Route::post('visits/chinese_medicines/{id}', 'VisitController@chinese_medicine_update');
    //新生儿家庭访视记录
    Route::post('visits/newborns', 'VisitController@newborn_store');
    Route::get('visits/newborns/{id}', 'VisitController@newborn_show');
    Route::post('visits/newborns/{id}', 'VisitController@newborn_update');

    Route::get('visits', 'VisitController@index');
    Route::resource('communities', 'CommunityController');
    //体检数据
    Route::get('healths/userinfo', 'HealthController@getHealths');
    Route::post('healths/health_list', 'HealthController@getDevicesHealthList');
    Route::post('healths/list_details', 'HealthController@getHealthListData');
    Route::resource('healths', 'HealthController');

    Route::post('health_wechat/bind','HealthWechatController@bind');
    Route::post('health_wechat/user_info','HealthWechatController@user_info');
    Route::get('health_wechat/archives/{id_code}','HealthWechatController@archives');
    Route::get('health_wechat/contracts/{id_code}','HealthWechatController@contracts');
    Route::get('health_wechat/health_list/{id_code}','HealthWechatController@health_list');
    Route::get('health_wechat/doctor_groups/{id}','HealthWechatController@doctor_groups');

});

//接口文档入口
Route::get('/', 'HomeController@index');

Route::post('login', 'LoginController@login');
//Route::post('healths', 'HealthController@store');

Route::group(['middleware' => 'client'], function () {
//    Route::get('/', 'HomeController@index');
    Route::resource('users', 'UserController');
//    Route::resource('healths', 'HealthController', ['except' => ['store']]);
    Route::get('users/{id}/archive', 'UserController@archive');
    Route::get('users/{id}/contracts', 'UserController@contracts');
    Route::get('users/{id}/family', 'UserController@family');
    Route::get('users/{id}/healths', 'UserController@healths');
    Route::get('users/{id}/{health}', 'UserController@getHealth');
    Route::get('users/{id}/{health}/last', 'UserController@getHealthLast');

    Route::resource('archives', 'ArchiveController', ['except' => ['store']]);
    Route::resource('areas', 'AreaController');
    Route::resource('articles', 'ArticleController');
    Route::resource('community_hospitals', 'CommunityHospitalController');
    Route::resource('contracts', 'ContractController');
    Route::resource('devices', 'DeviceController');
    Route::resource('families', 'FamilyController');
    Route::resource('groups', 'GroupController');
    Route::resource('packages', 'PackageController');
    Route::resource('staffs', 'StaffController');
    Route::resource('tenants', 'TenantController');
    Route::resource('archives', 'ArchiveController');

});
