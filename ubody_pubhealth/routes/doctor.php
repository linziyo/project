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


Route::group(['middleware' => array('auth', 'auth.doctor')], function () {

    Route::get("/", "HomeController@index");

    Route::resource("users", "UserController");

    Route::get("archives/query", "ArchiveController@query");
    Route::get("contract/query", "ContractController@query");
    Route::get('archives/center','ArchiveController@center');
    Route::get('my','HomeController@my');
    Route::get('personal/save','HomeController@save');
    Route::post('personal/updatepwd','HomeController@updatepwd');

    Route::resource("archives", "ArchiveController");
    Route::resource("families", "FamilyController");
    Route::get('contract/detail',"ContractController@detail");
    Route::resource("contracts", "ContractController");

    Route::get('personalCenter','HomeController@personal');

    Route::get('users/{userId}/archive', 'UserController@showArchive');
    Route::get('users/{userId}/family', 'UserController@showFamily');
    Route::get('detail', 'UserController@showDetail');

    Route::get('conversation', 'ConversationController@index');
    Event::listen('illuminate.query', function ($sql, $param) {
        file_put_contents(public_path() . '/sql.log', $sql . '[' . print_r($param, 1) . ']' . "\r\n", 8);
    });
});