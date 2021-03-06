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
Route::pattern('username','^[a-z0-9A-Z]+$');

Route::get('/','Frontend\Home@index');
Route::get('session/new','Auth\Sessions@index');
Route::post('session/new','Auth\Sessions@login');
Route::get('session/destroy','Auth\Sessions@destroy');

Route::controller('plan','Frontend\Plan');

Route::group(['prefix' => 'member' ,'middleware' => 'member'],function() {
    Route::get('profile/{username}','Auth\Sessions@profile');
});

Route::group(['prefix' => 'admin' ,'middleware' => 'administrator'],function() {
    Route::get('/','Backend\Dashboard@index');
    Route::resource("dashboard",'Backend\Dashboard');

    Route::resource('plan','Backend\Plan');
    Route::controller('plan','Backend\Plan');

    Route::post('member/delete/batch','Backend\Member@deleteBatch');
    Route::post('member/delete','Backend\Member@delete');
    Route::get('member/apply','Backend\Member@apply');
    Route::post('member/agree','Backend\Member@agree');
    Route::post('member/reject','Backend\Member@reject');
    Route::resource('member','Backend\Member');

    Route::controller('report','Backend\Report');
    Route::get('/graph','Backend\Graphs@index');
    Route::controller('graph','Backend\Graphs');

    Route::resource('operator','Backend\Operator');
    Route::controller('operator','Backend\Operator');

    Route::resource('accounting','Backend\Accounting');
});


