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

Route::name('home')->get('/', function () {
    return view('welcome');
});

Route::name('auth.register')->get('/register', 'Auth\RegistrationController@register');
Route::post('/register', 'Auth\RegistrationController@postRegister');

Route::name('auth.login')->get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@postLogin');
Route::name('auth.logout')->post('/logout', 'Auth\LoginController@logout');

Route::prefix('admin')->group(function() {
	Route::resource('/manage/user', 'Admin\UsersController');
	Route::resource('/manage/roles', 'Admin\RolesController');

	Route::name('assign.role')->post('/role/assign/{user}/{role}', 'Admin\ManageRolesController@assignRole');
	Route::name('remove.role')->post('/role/remove/{user}/{role}', 'Admin\ManageRolesController@removeRole');

});