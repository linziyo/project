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

Route::get("qrlogin", "Web\\QRLoginController@index");
Route::get("qrlogin/check", "Web\\QRLoginController@check");

Route::resource("documents", "Web\\DocumentController");
Route::resource("archives", "Web\\ArchiveController");

Route::get('/region/fetch', 'RegionController@fetch');
Route::get('/region/{id?}', "RegionController@show");
//Route::group(['prefix' => 'region'], function () {
//    Route::get('/fetch', 'RegionController@fetch');
//    Route::get('/{code}', 'RegionController@index');
//    Route::get('/', 'RegionController@index');
//});

Route::get("/word", "WordController@index");
Route::get("/", "HomeController@index");
Route::post("/request_valid_code", "Auth\\SmsController@requestValidateCode");
Auth::routes();