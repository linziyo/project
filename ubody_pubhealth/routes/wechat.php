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

Route::get("/", "HomeController@index");

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('bind', 'AuthController@getBind');
Route::post('bind', 'AuthController@postBind');
Route::any('valid', 'HomeController@valid');

Route::group(['middleware' => 'auth'], function () {

    Route::get("users/mobile", "UserController@mobile");
    Route::post("users/mobile", "UserController@changeMobile");
    Route::get("users/avatar", "UserController@avatar");
    Route::resource("users", "UserController");
    Route::resource("groups", "GroupController");
    Route::resource("contracts", "ContractController");
    Route::get("healths/profile", "HealthController@profile");
    Route::resource("healths", "HealthController");
    Route::resource("family", "FamilyController");
    Route::resource("archives", "ArchiveController");
    Route::resource("doctors", "DoctorController");
    Route::resource("articles", "ArticleController");
    Route::resource("appointments", "AppointmentController");

});