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

Route::group(
	[
		'prefix' => '{locale}',
		'middleware' => 'setLocale'
	],
	function () { }
);

Route::get('/', function () {
	return view('index');
});

Route::get('/health', function () {
	return response('Health Check OK', 200);
 });

Auth::routes(['register' => false]);

Route::get('logout','Auth\LoginController@logout')->middleware('auth');

Route::get('download/{invoice}','ExtraController@download');

Route::post('/offer-claim','OfferClaimController@store')->name('offer-claims.store');
Route::get('/legal-notice', 'ExtraController@getLegalNotice');
Route::get('/terms-and-conditions', 'ExtraController@getTermsAndConditions');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
	Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');
});

Route::group(['middleware' => ['auth', 'checkRole:super-admin']], function () {
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	Route::get('/users', 'User\UserController@index')->name('users.index');
	Route::get('/users/create', 'User\UserController@create')->name('users.create');
	Route::post('/users', 'User\UserController@store')->name('users.store');

	Route::get('/users/edit/{id}', 'User\UserController@edit')->name('users.edit');
	Route::put('/users/{id}', 'User\UserController@update')->name('users.update');
	Route::delete('/users/delete/{id}', 'User\UserController@destroy')->name('users.delete');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,super-admin']], function () {
	Route::get('/offer-claim', 'OfferClaimController@index')->name('offer-claims.index');
	Route::get('/offer-claim/{id}', 'OfferClaimController@show')->name('offer-claims.show');
	Route::post('/approve-claim/{id}', 'OfferClaimController@approve')->name('offer-claims.approve');
	Route::post('/disapprove-claim/{id}', 'OfferClaimController@disapprove')->name('offer-claims.disapprove');
});

