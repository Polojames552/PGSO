<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\DeleteDataController;
use App\Http\Controllers\ShowDataController;

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AipController;
use App\Http\Controllers\HealthController;
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
    return view('welcome');
})->name('welcome');
Route::get('firebase-phone-authentication', [FirebaseController::class, 'index']);
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

	// Route::get('table-list', function () {
	// 	return view('pages.table_list');
	// })->name('table');

	// Route::get('typography', function () {
	// 	return view('pages.typography');
	// })->name('typography');

	// Route::get('icons', function () {
	// 	return view('pages.icons');
	// })->name('icons');

	// Route::get('notifications', function () {
	// 	return view('pages.notifications');
	// })->name('notifications');

	// Route::get('rtl-support', function () {
	// 	return view('pages.language');
	// })->name('language');

	// Route::get('upgrade', function () {
	// 	return view('pages.upgrade');
	// })->name('upgrade');


	Route::get('AIP',[App\Http\Controllers\AipController::class ,'AIP_show'])->name('AIP');
	// Route::get('AIP', function () {
	// 	return view('pages.AIP');
	// })->name('AIP');

	Route::get('Assets',[App\Http\Controllers\AssetController::class ,'Assets_show'])->name('Assets');
	// Route::get('Assets', function () {
	// 	return view('pages.Assets');
	// })->name('Assets');

	Route::get('ESS', function () {
		return view('pages.ESS');
	})->name('ESS');

	Route::get('HDC', function () {
		return view('pages.HDC');
	})->name('HDC');

	Route::get('Health',[App\Http\Controllers\HealthController::class ,'Health_show'])->name('Health');
	// Route::get('Health', function () {
	// 	return view('pages.Health');
	// })->name('Health');

	Route::get('Others', function () {
		return view('pages.Others');
	})->name('Others');

	Route::get('SSS', function () {
		return view('pages.SSS');
	})->name('SSS');

	Route::get('SW', function () {
		return view('pages.SW');
	})->name('SW');


	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('reports', function () {
		return view('pages.reports');
	})->name('reports');



	// Delete Data 
	Route::delete('assets-delete/{id}', [AssetController::class ,'destroy']);
	Route::delete('aip-delete/{id}', [AipController::class ,'destroy']);
	Route::delete('health-delete/{id}', [HealthController::class ,'destroy']);
	//Add Data
	Route::post('add_aip',[AipController::class ,'store']);
	Route::post('asset',[AssetController::class ,'store']);
	Route::post('add_health',[HealthController::class ,'store']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
