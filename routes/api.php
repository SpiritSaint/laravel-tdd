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


Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function() {
	Route::get('admin/users/{user}', 'Admin\UsersController@show')->name('api.admin.users.show');
	

	/**
	 * Administrators upgrade/degrade
	 */
	Route::get('admin/users/{user}/upgrade-to-admin', 
				'Admin\UsersController@upgradeToAdmin')->name('api.admin.users.upgrade-to-admin');
	
	Route::get('admin/users/{user}/downgrade-to-user', 
				'Admin\UsersController@downgradeToUser')->name('api.admin.users.downgrade-to-user');	
});
