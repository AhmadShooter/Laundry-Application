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
Auth::routes();

route::get('/', function () {
    return redirect()->route('admin.Dashboard');
});
// Route::get('admin/login', 'Auth\LoginController@showFormLogin')->name('login');
// Route::post('login', 'Auth\LoginController@login');
route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
	route::group(['middleware' => ['role:admin|kasir|owner']], function(){
		//Dashboard
		route::get('Dashboard','Admin\AdminController@index')->name('Dashboard');
		//Outlet
		route::resource('outlet', 'Admin\OutletController');
		route::get('outlet/edit/{id}', 'Admin\OutletController@edit');
		route::post('outlet/update/{id}', 'Admin\OutletController@update');
		route::get('outlet/delete/{id}', 'Admin\OutletController@destroy');
		//Member
		route::resource('member', 'Admin\MemberController');
		route::get('member/edit/{id}', 'Admin\MemberController@edit');
		route::post('member/update/{id}', 'Admin\MemberController@update');
		route::get('member/delete/{id}', 'Admin\MemberController@destroy');
		//Paket
		route::resource('paket', 'Admin\PaketController');
		route::get('paket/edit/{id}', 'Admin\PaketController@edit');
		route::post('paket/update/{id}', 'Admin\PaketController@update');
		route::get('paket/delete/{id}', 'Admin\PaketController@destroy');
		route::get('paket/data/{id?}','Admin\PaketController@paket')->name('paket.data');
		//User
		route::resource('user', 'Admin\UserController');
		route::get('user/edit/{id}', 'Admin\UserController@edit');
		route::post('user/update/{id}', 'Admin\UserController@update');
		route::get('user/delete/{id}', 'Admin\UserController@destroy');
		//transaksi
		route::resource('transaksi', 'Admin\TransaksiController');
		route::get('transaksi/edit/{id}', 'Admin\TransaksiController@edit');
		route::post('transaksi/update/{id}','Admin\TransaksiController@update');
        route::get('transaksi/delete/{id}','Admin\TransaksiController@destroy');
        route::get('transaksi/struk/{id}','Admin\TransaksiController@show')->name('transaksi.struk');
		//laporan
		route::resource('laporan', 'Admin\LaporanController');
	});
	route::group(['middleware' => ['role:kasir|admin']],function(){
		//Outlet
		route::resource('outlet', 'Admin\OutletController');
		route::get('outlet/edit/{id}', 'Admin\OutletController@edit');
		route::post('outlet/update/{id}', 'Admin\OutletController@update');
		route::get('outlet/delete/{id}', 'Admin\OutletController@destroy');
		//Paket
		route::resource('paket', 'Admin\PaketController');
		route::get('paket/edit/{id}', 'Admin\PaketController@edit');
		route::post('paket/update/{id}', 'Admin\PaketController@update');
		route::get('paket/delete/{id}', 'Admin\PaketController@destroy');
		route::get('paket/data/{id?}','Admin\PaketController@paket')->name('paket.data');
		//transaksi
		route::resource('transaksi', 'Admin\TransaksiController');
		route::get('transaksi/edit/{id}', 'Admin\TransaksiController@edit');
		route::post('transaksi/update/{id}','Admin\TransaksiController@update');
        route::get('transaksi/delete/{id}','Admin\TransaksiController@destroy');
        route::get('transaksi/struk/{id}','Admin\TransaksiController@show')->name('transaksi.struk');
    });
    route::group(['middleware' => ['role:owner|admin|kasir']],function(){
    	//transaksi
		route::resource('transaksi', 'Admin\TransaksiController');
		route::get('transaksi/edit/{id}', 'Admin\TransaksiController@edit');
		route::post('transaksi/update/{id}','Admin\TransaksiController@update');
        route::get('transaksi/delete/{id}','Admin\TransaksiController@destroy');
        route::get('transaksi/struk/{id}','Admin\TransaksiController@show')->name('transaksi.struk');
        //laporan
		route::resource('laporan', 'Admin\LaporanController');
	});
});
