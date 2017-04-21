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
	Route::resource('/manage/roles', 'Admin\RolesController');
	Route::resource('/manage/users', 'Admin\UsersController');
	Route::name('user.roles')->get('/manage/users/{user}/roles', 'Admin\RolesController@userRoles');

	Route::name('assign.role')->post('/role/assign/{user}/{role}', 'Admin\ManageRolesController@assignRole');
	Route::name('remove.role')->post('/role/remove/{user}/{role}', 'Admin\ManageRolesController@removeRole');

	Route::prefix('profile')->group(function() {
		Route::name('admin.profile')->get('/', 'Admin\ProfileController@index');
		Route::name('admin.profile.edit')->get('/edit', 'Admin\ProfileController@edit');
		Route::name('admin.profile.update')->post('/edit', 'Admin\ProfileController@update');

		Route::prefix('address')->group(function() {
			Route::name('admin.address.index')->get('/', 'Admin\AddressController@index');
			Route::name('admin.address.create')->get('/create', 'Admin\AddressController@create');
			Route::name('admin.address.store')->post('/create', 'Admin\AddressController@store');
			Route::name('admin.address.edit')->get('/edit', 'Admin\AddressController@edit');
			Route::name('admin.address.update')->post('/edit', 'Admin\AddressController@update');
		});
	});
});

Route::prefix('user')->group(function() {

	Route::prefix('profile')->group(function() {
		Route::name('user.profile')->get('/', 'User\ProfileController@index');
		Route::name('user.profile.edit')->get('/edit', 'User\ProfileController@edit');
		Route::name('user.profile.update')->post('/edit', 'User\ProfileController@update');

		Route::prefix('address')->group(function() {
			Route::name('user.address.index')->get('/', 'User\AddressController@index');
			Route::name('user.address.create')->get('/create', 'User\AddressController@create');
			Route::name('user.address.store')->post('/create', 'User\AddressController@store');
			Route::name('user.address.edit')->get('/edit', 'User\AddressController@edit');
			Route::name('user.address.update')->post('/edit', 'User\AddressController@update');
		});
	});

	Route::get('/ajax-places/{region}', 'User\AddressController@ajaxCities');
	Route::name('user.avatar')->post('/ajax-avatar/{profile}', 'User\AvatarController@ajaxAvatar');
	Route::name('ucare.increment')->post('/ucare-increment', 'User\UcareController@increment');
});