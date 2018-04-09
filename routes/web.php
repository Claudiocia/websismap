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
    return view('home');
});


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('email-verification/error', 'EmailVerificationController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'EmailVerificationController@getVerification')->name('email-verification.check');

Route::get('admin/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin\\'], function (){
    Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');

    Route::group(['middleware' => ['isVerified', 'can:admin']], function (){
        Route::name('logout')->post('logout', 'Auth\LoginController@logout');
        Route::get('dashboard', function (){
            return "Area Administrativa Funcionando";
        });
        Route::name('user_settings.edit')->get('users/settings', 'Auth\UserSettingsController@edit');
        Route::name('user_settings.update')->put('users/settings', 'Auth\UserSettingsController@update');
        Route::resource('users', 'UsersController');
        Route::resource('empres', 'EmpresController');
        Route::resource('predios', 'PrediosController');
        Route::resource('setors', 'SetorsController');
        Route::group(['prefix' => 'unids', 'as' => 'unids.'], function (){
            Route::name('relacoes.create')->get('{unidade}/relacoes', 'UnidadeRelacoesController@create');
            Route::name('relacoes.store')->post('{unidade}/relacoes', 'UnidadeRelacoesController@store');
        });
        Route::resource('unidades', 'UnidadesController');
        Route::resource('materials', 'MaterialsController');
    });
});

