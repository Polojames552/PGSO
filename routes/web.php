<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\DeleteDataController;
use App\Http\Controllers\ShowDataController;

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AipController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\GpssController;
use App\Http\Controllers\HdcController;
use App\Http\Controllers\SssController;
use App\Http\Controllers\SwController;
use App\Http\Controllers\EssController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PdfController;
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

	// Route::get('map', function () {
	// 	return view('pages.map');
	// })->name('map');

	// Route::get('AIP', function () {
	// 	return view('pages.AIP');
	// })->name('AIP');

	// Route::get('Assets', function () {
	// 	return view('pages.Assets');
	// })->name('Assets');

	// Route::get('Health', function () {
	// 	return view('pages.Health');
	// })->name('Health');

		// Route::get('HDC', function () {
	// 	return view('pages.HDC');
	// })->name('HDC');

	
	// Route::get('SSS', function () {
	// 	return view('pages.SSS');
	// })->name('SSS');

	
	// Route::get('SW', function () {
	// 	return view('pages.SW');
	// })->name('SW');

	// Route::get('ESS', function () {
	// 	return view('pages.ESS');
	// })->name('ESS');

	// Route::get('Others', function () {
	// 	return view('pages.Others');
	// })->name('Others');

	// Route::get('GPSS', function () {
	// 	return view('pages.GPSS');
	// })->name('GPSS');

	Route::get('AIP',[App\Http\Controllers\AipController::class ,'AIP_show'])->name('AIP');
	Route::get('Assets',[App\Http\Controllers\AssetController::class ,'Assets_show'])->name('Assets');
	Route::get('Health',[App\Http\Controllers\HealthController::class ,'Health_show'])->name('Health');
	Route::get('GPSS',[App\Http\Controllers\GpssController::class ,'Gpss_show'])->name('GPSS');
	Route::get('HDC',[App\Http\Controllers\HdcController::class ,'Hdc_show'])->name('HDC');
	Route::get('SSS',[App\Http\Controllers\SssController::class ,'Sss_show'])->name('SSS');
	Route::get('SW',[App\Http\Controllers\SwController::class ,'Sw_show'])->name('SW');
	Route::get('ESS',[App\Http\Controllers\EssController::class ,'Ess_show'])->name('ESS');
	Route::get('Others',[App\Http\Controllers\OtherController::class ,'Other_show'])->name('Others');
	Route::get('Pdf',[App\Http\Controllers\PdfController::class ,'GetHealthData'])->name('Pdf');
	


	Route::get('reports', function () {
		return view('pages.reports');
	})->name('reports');


	// PDF
	// Route::post('PDF_Form',[App\Http\Controllers\PdfController::class,'PDF_health'])->name('PDF_Form');
	Route::get('Export_PDF',[App\Http\Controllers\PdfController::class,'Health_Export'])->name('Export_PDF');
	// Delete Data 
	Route::delete('assets-delete/{id}', [AssetController::class ,'destroy']);
	Route::delete('aip-delete/{id}', [AipController::class ,'destroy']);
	Route::delete('health-delete/{id}', [HealthController::class ,'destroy']);
	Route::delete('gpss-delete/{id}', [GpssController::class ,'destroy']);
	Route::delete('hdc-delete/{id}', [HdcController::class ,'destroy']);
	Route::delete('sss-delete/{id}', [SssController::class ,'destroy']);
	Route::delete('sw-delete/{id}', [SwController::class ,'destroy']);
	Route::delete('ess-delete/{id}', [EssController::class ,'destroy']);
	Route::delete('other-delete/{id}', [OtherController::class ,'destroy']);
	//Add Data
	Route::post('add_aip',[AipController::class ,'store']);
	Route::post('asset',[AssetController::class ,'store']);
	Route::post('add_health',[HealthController::class ,'store']);
	Route::post('add_gpss',[GpssController::class ,'store']);
	Route::post('add_hdc',[HdcController::class ,'store']);
	Route::post('add_sss',[SssController::class ,'store']);
	Route::post('add_sw',[SwController::class ,'store']);
	Route::post('add_ess',[EssController::class ,'store']);
	Route::post('add_other',[OtherController::class ,'store']);
	//Edit Data
	Route::post('edithealth/{id}',[HealthController::class ,'update_health'])->name('edithealth');
	Route::post('editgpss/{id}',[GpssController::class ,'update_gpss'])->name('editgpss');
	Route::post('editasset/{id}',[AssetController::class ,'update_asset'])->name('editasset');
	Route::post('editaip/{id}',[AipController::class ,'update_aip'])->name('editaip');
	Route::post('edithdc/{id}',[HdcController::class ,'update_hdc'])->name('edithdc');
	Route::post('editsss/{id}',[SssController::class ,'update_sss'])->name('editsss');
	Route::post('editsw/{id}',[SwController::class ,'update_sw'])->name('editsw');
	Route::post('editess/{id}',[EssController::class ,'update_ess'])->name('editess');
	Route::post('editother/{id}',[OtherController::class ,'update_other'])->name('editother');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
