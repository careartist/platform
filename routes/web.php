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

	Route::prefix('manage')->group(function() {
		Route::resource('/roles', 'Admin\RolesController');
		Route::resource('/users', 'Admin\UsersController');
		Route::name('user.roles')->get('/users/{user}/roles', 'Admin\RolesController@userRoles');

		Route::prefix('role')->group(function() {
			Route::resource('/requests', 'Admin\RoleRequestController');
		});
	});

	Route::prefix('role')->group(function() {
		Route::name('assign.role')->post('/assign/{user}/{role}', 'Admin\ManageRolesController@assignRole');
		Route::name('remove.role')->post('/remove/{user}/{role}', 'Admin\ManageRolesController@removeRole');
		
		Route::name('accept.request')->post('/request/accept/{profile}', 'Admin\ManageRequestController@acceptRequest');
		Route::name('reject.request')->post('/request/reject/{profile}', 'Admin\ManageRequestController@rejectRequest');


	});

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

		Route::name('user.request.role.show')->get('/requests/role/{request}', 'User\RoleRequestController@show');
		
		Route::prefix('address')->group(function() {
			Route::name('user.address.index')->get('/', 'User\AddressController@index');
			Route::name('user.address.create')->get('/create', 'User\AddressController@create');
			Route::name('user.address.store')->post('/create', 'User\AddressController@store');
			Route::name('user.address.edit')->get('/edit', 'User\AddressController@edit');
			Route::name('user.address.update')->post('/edit', 'User\AddressController@update');
		});
	});
	
	Route::prefix('profile')->group(function() {
		Route::resource('/artist', 'Artist\ProfileController');
	});

	Route::resource('/events', 'Artist\EventController');

	Route::name('user.request.role.create')->get('/request/role/{type}', 'User\RoleRequestController@create');
	Route::name('user.request.role.store')->post('/request/role', 'User\RoleRequestController@store');

	Route::get('/ajax-places/{region}', 'User\AddressController@ajaxCities');
	Route::name('user.avatar')->post('/ajax-avatar/{profile}', 'User\AvatarController@ajaxAvatar');
	Route::name('ucare.increment')->post('/ucare-increment', 'User\UcareController@increment');
});

Route::prefix('services')->group(function() {
	Route::prefix('describe')->group(function() {
		Route::name('describe.role')->get('/role/{role}', 'User\DescribeRoleController@role');
	});
});