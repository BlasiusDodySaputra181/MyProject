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

Route::get('/', function () {
	return redirect('utama');
});
Route::post('masuk', 'Auth\loginController@login');
Route::post('logout', 'Auth\loginController@logout');
Route::get('loggedcheck','homeController@loggedcheck');
Route::post('daftar', 'Auth\registerController@register');
Route::get('masuk', 'Auth\loginController@showloginform');
Route::get('daftar', 'Auth\registerController@showregistrationform');
Route::post('getregisternamecheck','Auth\registerController@checknameregister');
Route::group(['middleware'=>'auth'], function (){
	// SIDE ROUTE GET
	Route::get('setuser','userController@setuser');
	Route::get('user/index','userController@index');
	Route::get('report/index','sideController@index');
	Route::get('setname','userController@setusername');
	Route::get('agency/index','agencyController@index');
	Route::get('pagefooter','homeController@pagefooter');
	Route::get('check/{date}','monitoringController@check');
	Route::get('signature/index','signatureController@index');
	Route::get('monitoring/index','monitoringController@index');
	Route::get('report/getoption','reportController@getoption');
	Route::get('reportopen/{reportmonth}','sideController@indexopen');
	Route::get('monitoring/getoption','monitoringController@getoption');
	Route::get('pengguna','sideController@createuser');
	Route::get('printmonitoringpdf01/{date}','exportController@getpdf01');
	Route::get('instansi','sideController@createagency');
	Route::get('printmonitoringword01/{date}','exportController@getword01');
	Route::get('printmonitoringexcel01/{date}','exportController@getexcel01');
	Route::get('laporan','sideController@createreportindex');
	Route::get('printmonitoringexcel00/{month}','exportController@getexcel00');
	Route::get('printmonitoringpdf02/{description}','exportController@getpdf02');
	Route::get('laporan/bulanan/{month}','sideController@createreportindexopen');
	Route::get('laporan/mingguan/{date}','sideController@createreportdetailopen');
	Route::get('reportdetailopen/{reportdate}','reportController@indexdetailopen');
	Route::get('printmonitoringword02/{description}','exportController@getword02');
	Route::get('utama','sideController@createmonitoring');
	Route::get('tandatangan','sideController@createsignature');
	Route::get('printmonitoringexcel02/{description}','exportController@getexcel02');
	Route::get('signature/buttoncheckdisabled','signatureController@buttoncheckdisabled');
	Route::get('monitoring/buttoncheckdisabled','monitoringController@buttoncheckdisabled');
	// UP ROUTE GET
	Route::get('horizontal/report/index','upController@index');
	Route::get('horizontal/reportopen/{reportmonth}','upController@indexopen');
	Route::get('horisontal/laporan/bulanan/{month}','upController@createreportindexopen');
	Route::get('horisontal/laporan/mingguan/{date}','upController@createreportdetailopen');
	Route::get('horisontal/pengguna','upController@createuser');
	Route::get('horisontal/instansi','upController@createagency');
	Route::get('horisontal/laporan','upController@createreportindex');
	Route::get('horisontal/utama','upController@createmonitoring');
	Route::get('horisontal/tandatangan','upController@createsignature');
	// ROUTE POST
	Route::post('storeuser','userController@store');
	Route::post('storeagency','agencyController@store');
	Route::post('storereport','reportController@store');
	Route::post('getnamecheck','userController@checkname');
	Route::post('storedivision','monitoringController@store');
	Route::post('storesignature','signatureController@store');
	Route::post('importexcel', 'importController@importexcel');
	Route::post('storesubdivision','monitoringController@storesub');
	Route::post('storereportbydate','reportController@storebydate');
	Route::post('storedateupdate','reportController@storedateupdate');
	Route::post('storebymonthandyear','reportController@storebymonthandyear');
	Route::post('getsignaturenumbercheck','signatureController@checksignaturenumber');
	// ROUTE DELETE
	Route::delete('user/destroy/{id}','userController@destroy');
	Route::delete('agency/destroy/{id}','agencyController@destroy');
	Route::delete('report/destroy/{id}','reportController@destroy');
	Route::delete('signature/destroy/{id}','signatureController@destroy');
	Route::delete('destroybydate/{date}','reportController@destroybydate');
	Route::delete('destroydivision/{id}','monitoringController@destroydivision');
	Route::delete('destroysubdivision/{id}','monitoringController@destroysubdivision');
	Route::delete('destroybymonthandyear/{monthandyear}','reportController@destroybymonthandyear');
});