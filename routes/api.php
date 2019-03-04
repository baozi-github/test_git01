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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('pp',function(){
	return 123;
});




Route::group(['namespace' => 'Admin'], function () {
// 在 "App\Http\Controllers\Admin" 命名空间下的控制器
	// 登陆
	Route::get('login','LoginController@index')->name('login');
	// 获取验证码
	Route::get('captcha','LoginController@captcha');
	// 执行登录
	Route::post('login','LoginController@doLogin');
	// 退出登陆

	// 中间件测试
//	Route::get('tt',function(){
//		return \App\Models\AuthMember::find(1);
//		//return new Test(AuthMember::find(1));
//		//return new UserCollection(AuthMember::find(1));
//
//	});
	Route::get('tt','LoginController@tt');

	Route::post('index/getRotate','IndexController@getRotate');
	Route::post('index/getProductCategory','IndexController@getProductCategory');
	Route::post('index/search','IndexController@search');

});
