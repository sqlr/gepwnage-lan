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
 * Authentication Routes...
 */
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

/*
 * Registration Routes...
 */
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
$this->get('register', 'RegistrationController@index')->name('register');
$this->post('register/gewis', 'RegistrationController@registerByGEWISId')->name('register.gewis');
$this->post('register/external', 'RegistrationController@registerByEmail')->name('register.external');

/*
 * Password Reset Routes...
 */
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

/*
 * Public Information
 */
Route::get('/', 'PublicController@index')->name('home');
Route::get('information/location', 'InformationController@location')->name('information.location');
Route::get('information/packing-list', 'InformationController@packingList')->name('information.packing-list');
Route::get('information/pricing', 'InformationController@pricing')->name('information.pricing');
Route::get('information/schedule', 'InformationController@schedule')->name('information.schedule');
Route::get('information/visitors', 'InformationController@visitors')->name('information.visitors');

/*
 * Admin Panel
 */
Route::namespace('Admin')
    ->middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('home');
    });