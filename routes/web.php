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
 * Public Information
 */
Route::get('/', 'PublicController@index')->name('home');
Route::prefix('information')
    ->name('information')
    ->group(function () {
        Route::get('location', 'InformationController@location')->name('.location');
        Route::get('packing-list', 'InformationController@packingList')->name('.packing-list');
        Route::get('pricing', 'InformationController@pricing')->name('.pricing');
        Route::get('schedule', 'InformationController@schedule')->name('.schedule');
        Route::get('visitors', 'InformationController@visitors')->name('.visitors');
    });

Route::get('participants', 'ParticipantsController@index')->middleware('auth')->name('participants');
Route::get('poster', 'PosterController@index')->name('poster');

/*
 * Authentication Routes...
 */
Route::namespace('Auth')
    ->group(function () {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');

        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::prefix('password')
            ->name('password')
            ->group(function () {
                Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('.request');
                Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('.email');
                Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('.reset');
                Route::post('reset', 'ResetPasswordController@reset');
            });

        Route::prefix('gewis')
            ->name('gewis')
            ->group(function () {
                Route::get('login', 'GEWISController@login')->name('.login');
                Route::get('callback', 'GEWISController@callback')->name('.callback');
            });
    });

/*
 * User management
 */
Route::prefix('users')
    ->name('users')
    ->middleware('auth')
    ->group(function () {
        Route::get('{user}', 'UserController@show')->name('.show');
    });

/*
 * Ticket Sales
 */
Route::prefix('tickets')
    ->name('tickets')
    ->group(function () {
        Route::get('/', 'TicketController@index');

        Route::middleware('auth')
            ->group(function () {
                Route::get('{ticket}', 'TicketController@show')->name('.show');
                Route::post('{ticket}', 'TicketController@buy')->name('.buy');
            });
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    });

/*
 * Admin Panel
 */
Route::prefix('admin')
    ->name('admin')
    ->middleware(['auth', 'role:admin'])
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('.home');
    });