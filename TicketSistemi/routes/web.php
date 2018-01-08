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
Route::get('/','Auth\LoginController@get_login');

Route::get('/login','Auth\LoginController@get_login');
Route::get('/register','Auth\RegisterController@get_register');
Route::get('/getTicket','HomeGetController@get_getTicket');

Auth::routes();
Route::group(['prefix'=>'user'],function (){


    Route::get('/','HomeGetController@get_index');
    Route::post('/','HomePostController@post_DeleteTicket');


    Route::get('/profile','HomeGetController@get_profile');
    Route::post('/profile','HomePostController@post_profile');

    Route::get('/ticket/create','HomeGetController@get_CreateTicket');
    Route::post('/ticket/create','HomePostController@post_CreateTicket');


});


Route::group(['prefix'=>'admin', 'middleware' =>'Admin'],function (){

    Route::get('/','AdminGetController@get_index');
    Route::post('/','AdminPostController@post_index');

    Route::get('/profile/','AdminGetController@get_profile');
    Route::post('/profile/','AdminPostController@post_profile');

    Route::get('/ticket/type/add','AdminGetController@get_ticketType_add');
    Route::post('/ticket/type/add','AdminPostController@post_ticketType_add');


});
