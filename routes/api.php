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

/*****************版本控制示例******************/
//版本v1
Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::get('version', function () {
        //abort(403, 'test');
        return 'this is version v1';
    })->name('version');
});
//版本v2
Route::prefix('v2')->name('api.v2.')->group(function () {
    Route::get('version', function () {
        return 'this is version v2';
    })->name('version');
});


//所有 v1 版本的路由都会默认使用 Api 目录中的控制器
Route::prefix('v1')->namespace('Api')->name('api.v1.')->group(function () {

    // 短信验证码
    Route::post('verificationCodes', 'VerificationCodesController@store')
        ->name('verificationCodes.store');
});




