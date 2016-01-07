<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::match(['get', 'post'],'/wangyi',function () {
    return '是的，就是';
});
//初始界面
Route::match(['get', 'post'],'/','HomeController@index');
//首页
Route::match(['get', 'post'],'/home', 'HomeController@index');
//创建
Route::match(['get', 'post'],'/home/create','HomeController@create');
//新增
Route::match(['get', 'post'],'/home/add','HomeController@add');
//注册模型
Route::model('user','App\Http\Models\User',function()
{
    throw new NotFoundHttpException;
});
//闭包方法
Route::get('user/{user}',function(App\Http\Models\User $user)
{
	return $user;
});

//bind 方法
Route::bind('user', function($value, $route)
{
	return \App\Http\Models\User::where('USER_NAME', $value)->first();
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);