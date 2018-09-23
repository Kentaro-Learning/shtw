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
/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/','Win_menbersController@index');
Route::post('result', 'Win_menbersController@show_result')->name('result');
Route::get('result', 'Win_menbersController@show')->name('result');
Route::post('result_more', 'Win_menbersController@show_result_more')->name('result_more');
//Route::get('result', 'Win_menbersController@show_more')->name('result_more');

//新規投稿
Route::resource('Win_menbers', 'Win_menbersController');
Route::post('Win_menbers/pre_create','Win_menbersController@pre_store')->name('Win_menbers.pre_store');
//Route::resource('characters', 'CharactersController');


//投稿編集
//Route::get('Win_menbers/{id}/edit','Win_menbersController@edit')->name(Win_menbers.edit);
//Route::post('Win_menbers/{id}','Win_menbersController@update')->name(Win_menbers.update);

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// ログイン状態の'admin'ユーザーのみアクセス可能
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::resource('environments', 'EnvironmentsController');
    Route::resource('characters', 'CharactersController');
});
