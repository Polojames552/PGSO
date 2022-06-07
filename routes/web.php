<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\DeleteDataController;
use App\Http\Controllers\ShowDataController;

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AipController;
use App\Http\Controllers\GpssController;
use App\Http\Controllers\HdcController;
use App\Http\Controllers\SssController;
use App\Http\Controllers\SwController;
use App\Http\Controllers\EssController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PrietoDiazMedHospitalController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\ProvincialAdminOfficeController;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\PgsoMedDentalSupController;
use App\Http\Controllers\OTPController;
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
Route::get('/register',[App\Http\Controllers\OTPController::class ,'index'])->name('register');
Route::post('/register/check',[App\Http\Controllers\OTPController::class ,'check'])->name('register.check');
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
	Route::get('PrietoDiazMedHospital',[App\Http\Controllers\PrietoDiazMedHospitalController::class ,'Health_show'])->name('PrietoDiazMedHospital');
	Route::get('GPSS',[App\Http\Controllers\GpssController::class ,'Gpss_show'])->name('GPSS');
	Route::get('HDC',[App\Http\Controllers\HdcController::class ,'Hdc_show'])->name('HDC');
	Route::get('SSS',[App\Http\Controllers\SssController::class ,'Sss_show'])->name('SSS');
	Route::get('SW',[App\Http\Controllers\SwController::class ,'Sw_show'])->name('SW');
	Route::get('ESS',[App\Http\Controllers\EssController::class ,'Ess_show'])->name('ESS');
	Route::get('Others',[App\Http\Controllers\OtherController::class ,'Other_show'])->name('Others');
	Route::get('Tourism',[App\Http\Controllers\TourismController::class ,'Tourism_show'])->name('Tourism');
	Route::get('ProvincialAdminOffice',[App\Http\Controllers\ProvincialAdminOfficeController::class ,'ProvincialAdminOffice_show'])->name('ProvincialAdminOffice');
	Route::get('PGSOMedicalDental',[App\Http\Controllers\PgsoMedDentalSupController::class ,'PgsoMedDentalSup_show'])->name('PGSOMedicalDental');
	
	Route::get('Pdfsample', function () {
		return view('PDF.Pdfsample');
	})->name('Pdfsample');

	Route::get('PDFpreview', function () {
		return view('PDFpreview');
	})->name('PDFpreview');

	Route::get('reports', function () {
		return view('pages.reports');
	})->name('reports');

	// PDF VIEW
	Route::get('PdfPrietoDiazMedHospital',[App\Http\Controllers\PdfController::class ,'PDFPrietoDiazMedHospitalData'])->name('PdfPrietoDiazMedHospital');
	Route::get('PdfTourism',[App\Http\Controllers\PdfController::class ,'PDFTourismData'])->name('PdfTourism');
	Route::get('PdfProvincialAdmin',[App\Http\Controllers\PdfController::class ,'PdfProvincialAdminData'])->name('PdfProvincialAdmin');
	Route::get('PdfPGSOMedicalDental',[App\Http\Controllers\PdfController::class ,'PdfPGSOMedicalDentalData'])->name('PdfPGSOMedicalDental');
	// PDF Export
	// Route::post('PDF_Form',[App\Http\Controllers\PdfController::class,'PDF_health'])->name('PDF_Form');
	Route::get('PrietoDiazMedHospital_PDF',[App\Http\Controllers\PdfController::class,'PrietoDiazMedHospital_Export'])->name('PrietoDiazMedHospital_PDF');
	Route::get('Tourism_PDF',[App\Http\Controllers\PdfController::class,'Tourism_Export'])->name('Tourism_PDF');
	Route::get('ProvincialAdmin_PDF',[App\Http\Controllers\PdfController::class,'ProvincialAdmin_Export'])->name('ProvincialAdmin_PDF');
	// Excel Export
	Route::get('/PrietoDiazMedHospital_export',[PrietoDiazMedHospitalController::class ,'export']);
	Route::get('/Tourism_export',[TourismController::class ,'export']);
	Route::get('/ProvincialAdmin_Excel',[ProvincialAdminOfficeController::class ,'export']);
	// Delete Data 
	Route::delete('assets-delete/{id}', [AssetController::class ,'destroy']);
	Route::delete('aip-delete/{id}', [AipController::class ,'destroy']);
	Route::delete('health-delete/{id}', [PrietoDiazMedHospitalController::class ,'destroy']);
	Route::delete('gpss-delete/{id}', [GpssController::class ,'destroy']);
	Route::delete('hdc-delete/{id}', [HdcController::class ,'destroy']);
	Route::delete('sss-delete/{id}', [SssController::class ,'destroy']);
	Route::delete('sw-delete/{id}', [SwController::class ,'destroy']);
	Route::delete('ess-delete/{id}', [EssController::class ,'destroy']);
	Route::delete('other-delete/{id}', [OtherController::class ,'destroy']);
	Route::delete('tourism-delete/{id}', [TourismController::class ,'destroy']);
	Route::delete('ProvincialAdmin-delete/{id}', [ProvincialAdminOfficeController::class ,'destroy']);
	//Add Data
	Route::post('add_aip',[AipController::class ,'store']);
	Route::post('asset',[AssetController::class ,'store']);
	Route::post('add_health',[PrietoDiazMedHospitalController::class ,'store']);
	Route::post('add_gpss',[GpssController::class ,'store']);
	Route::post('add_hdc',[HdcController::class ,'store']);
	Route::post('add_sss',[SssController::class ,'store']);
	Route::post('add_sw',[SwController::class ,'store']);
	Route::post('add_ess',[EssController::class ,'store']);
	Route::post('add_other',[OtherController::class ,'store']);
	Route::post('add_tourism',[TourismController::class ,'store']);
	Route::post('add_ProvincialAdminData',[ProvincialAdminOfficeController::class ,'store']);
	Route::post('add_PGSOMedicalDental',[PgsoMedDentalSupController::class ,'store']);
	//Edit Data
	Route::post('edithealth/{id}',[PrietoDiazMedHospitalController::class ,'update_health'])->name('edithealth');
	Route::post('editgpss/{id}',[GpssController::class ,'update_gpss'])->name('editgpss');
	Route::post('editasset/{id}',[AssetController::class ,'update_asset'])->name('editasset');
	Route::post('editaip/{id}',[AipController::class ,'update_aip'])->name('editaip');
	Route::post('edithdc/{id}',[HdcController::class ,'update_hdc'])->name('edithdc');
	Route::post('editsss/{id}',[SssController::class ,'update_sss'])->name('editsss');
	Route::post('editsw/{id}',[SwController::class ,'update_sw'])->name('editsw');
	Route::post('editess/{id}',[EssController::class ,'update_ess'])->name('editess');
	Route::post('editother/{id}',[OtherController::class ,'update_other'])->name('editother');
	Route::post('edittourism/{id}',[TourismController::class ,'update_tourism'])->name('edittourism');
	Route::post('editProvincialAdmin/{id}',[ProvincialAdminOfficeController::class ,'update_ProvincialData'])->name('editProvincialAdmin');
	Route::post('editPGSOMedicalDental/{id}',[PgsoMedDentalSupController::class ,'update_MedicalDentalData'])->name('editPGSOMedicalDental');
	
	//Import Data From Excel
	Route::post('ImportPrietoDiazMedHospital',[ImportDataController::class ,'PrietoDiazMedHospitalImport'])->name('ImportPrietoDiazMedHospital');
	Route::post('ImportProvincialAdminOffice',[ImportDataController::class ,'ProvincialAdminOfficeImport'])->name('ImportProvincialAdminOffice');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
