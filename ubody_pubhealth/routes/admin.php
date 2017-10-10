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


Route::get("login", "AuthController@getLogin");
Route::post("login", "AuthController@postLogin");
Route::post("logout", "AuthController@postLogout");
Route::get("reset", "AuthController@getReset");
Route::post("reset", "AuthController@postReset");

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get("/", "HomeController@index");
    Route::resource("tenants", "TenantController");
    Route::resource("healths", "HealthController");
    Route::resource("hospitals", "CommunityHospitalController");
    Route::resource("communities", "CommunityController");
    Route::resource("areas", "AreaController");
    Route::resource("staff", "StaffController");

    Route::get("groups/add", "GroupController@add");
    Route::get("groups/add_package", "GroupController@add_package");
    Route::post("groups/group_docotr","GroupController@group_doctor");
    Route::post("groups/group_package","GroupController@group_package");

    Route::resource("groups", "GroupController");
    Route::resource("doctors", "DoctorController");
    Route::resource("packages", "PackageController");
    Route::resource("services", "ServiceController");
    Route::resource("users", "UserController");
    Route::resource("contracts", "ContractController");
    Route::resource("archives", "ArchiveController");
    Route::resource("devices", "DeviceController");
    Route::resource("weixin", "WeixinController");

    Route::resource("admins", "AdminController");
    Route::resource("roles", "RoleController");
    Route::resource("permissions", "PermissionController");
    Route::resource("hospitals", "CommunityHospitalController");
    Route::resource("visitnewborn", "VisitNewbornController");
    Route::resource("group_doctor", "Group_doctorController");
    Route::resource("visit_selfcare_ability", "Visit_selfcare_abilityController");

//    Group_doctors
    Route::resource("visitkids", "VisitKidsController");
    Route::resource("visitmentalspatient", "VisitMentalPatientsController");
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

    Route::resource("sync", "SyncController");



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




});
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