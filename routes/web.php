<?php

use Illuminate\Support\Facades\Route;

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
 * Authentication Routes...
 */
Route::namespace('Auth')
    ->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::prefix('password')
            ->name('password.')
            ->group(function () {
                Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
                Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
                Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
                Route::post('reset', 'ResetPasswordController@reset');
            });

        Route::get('gewis/login', 'GEWISController@login')->name('gewis.login');
        Route::get('gewis/callback', 'GEWISController@callback')->name('gewis.callback');
    });

/*
 * Registration Routes...
 */
Route::prefix('register')
    ->group(function () {
        Route::get('/', 'RegistrationController@index')->name('register');
        Route::post('gewis', 'RegistrationController@registerByGEWISId')->name('register.gewis');
        Route::post('external', 'RegistrationController@registerByEmail')->name('register.external');
    });
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

/*
 * Public Information
 */
Route::get('/', 'PublicController@index')->name('home');
Route::prefix('information')
    ->name('information.')
    ->group(function () {
        Route::get('location', 'InformationController@location')->name('location');
        Route::get('packing-list', 'InformationController@packingList')->name('packing-list');
        Route::get('pricing', 'InformationController@pricing')->name('pricing');
        Route::get('schedule', 'InformationController@schedule')->name('schedule');
        Route::get('visitors', 'InformationController@visitors')->name('visitors');
    });

Route::get('poster', 'PosterController@index')->name('poster');

/*
 * Admin Panel
 */
Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('home');
    });