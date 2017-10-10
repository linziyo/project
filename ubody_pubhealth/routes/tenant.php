<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

    Route::get("/", "HomeController@index");
    Route::resource("/profiles", 'ProfileController');
//    Route::get("/charts", 'HomeController@getCharts');
    Route::get("/charts", 'HomeController@getWeeks');


    Route::group(['middleware' => 'role:doctor'], function () {
        Route::resource("archives", "ArchiveController");
        Route::get("archives/{id}/base", "ArchiveController@getArchivesBase");
        Route::get("archives/{id}/visitor", "ArchiveController@getArchivesVisitor");
        Route::get("archives/{id}/contract", "ArchiveController@getArchivesContract");
        Route::get("archives/{id}/health", "ArchiveController@getArchivesHealth");
        Route::get("archives/{id}/contract", "ArchiveController@getArchivesContract");

        Route::resource("healths", "HealthController");
        Route::get('healths/MachineId/{MachineId}/DeviceType/{DeviceType}',"HealthController@getHealths");
        Route::get('healths/{IdCode}/{HealthType}',"HealthController@getHealthListData");

        Route::resource("contracts", "ContractController");
        Route::resource("interviews", "InterviewController");
        Route::resource("families", "FamilyController");
        Route::resource("contractFamily", "ContractFamilyController");
    });


    Route::group(['middleware' => 'role:staff'], function () {
        Route::resource("tenants", "TenantController");
        Route::resource("hospitals", "CommunityHospitalController");
        Route::resource("communities", "CommunityController");
        Route::resource("areas", "AreaController");
        Route::resource("groups", "GroupController");
        Route::resource("doctors", "DoctorController");
        Route::resource("packages", "PackageController");
        Route::resource("devices", "DeviceController");
        Route::resource("articles", "ArticleController");
        Route::resource("users", "UserController");
        Route::resource("admins", "AdminController");
        Route::resource("roles", "RoleController");
        Route::resource("permissions", "PermissionController");
        Route::get("groups/{id}/doctors", "GroupController@getGroupDoctors");
        Route::get("groups/{id}/doctors", "GroupController@getGroupDoctors");
        Route::post("groups/{id}/doctors", "GroupController@postGroupDoctors");
        Route::get("group/{id}/packages", "GroupController@getGroupPackages");
        Route::post("group/{id}/packages", "GroupController@postGroupPackages");

        Route::any("weixin/serve", "WechatController@serve");
        Route::get("weixin/auth", "WechatController@auth");
        Route::resource("weixin", "WechatController");

        Route::any('auth-dispatch','AuthDispatchController@index');
        Route::post('auth-archive','AuthDispatchController@authArchive');
        Route::post('auth-device','AuthDispatchController@authDevice');

        Route::resource("visits", "VisitController");
        Route::resource("visit/hypertension", "VisitHypertensionController", [
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitHypertension']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/diabetes", "VisitDiabetesController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitDiabete']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/mentalPatient", "VisitMentalPatientController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitMentalPatient']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/selfCareAbility", "VisitSelfCareAbilityController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitSelfCareAbility']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/tuberculosisFirstRecord", "VisitTuberculosisFirstRecordController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisFirstRecord']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/chineseMedicine", "VisitChineseMedicineController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitChineseMedicine']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/newborn", "VisitNewbornController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitNewborn']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/kids", "VisitKidController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitKid']['table'] . '.show'
            ]
        ]);
        Route::resource("visit/tuberculosisPatient", "VisitTuberculosisPatientController",[
            'names' => [
                'create' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.create',
                'store' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.store',
                'edit' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.edit',
                'update' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.update',
                'destroy' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.destroy',
                'show' => \App\Models\Visit::$visit_types['App\Models\VisitTuberculosisPatient']['table'] . '.show'
            ]
        ]);

        Route::resource('statistics',"ArchivesStatisticsController");
        Route::get("archive/{id}/statistics", "ArchivesStatisticsController@getArchivesStatistics");
        Route::resource('dataSynchronous',"DataSynchronousController");
        Route::post('areas/luoHu/dataSynchronous',"DataSynchronousController@getLuoHuHealth");
    });
});