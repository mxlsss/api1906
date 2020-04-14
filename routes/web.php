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

Route::get('/', function () {
    return view('welcome');
});
//注册
Route::post('login/reg','Api\LoginController@reg');
//登录
Route::post('login/','Api\LoginController@login');
//商品详情
Route::\Facade\FlareClient\Http\get('list','Api\LoginController@goodlist');
