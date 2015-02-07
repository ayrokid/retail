<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function(){
	if (Session::has('username')):
        return Redirect::to('dashboard');
    else:
    	return Redirect::to('/');
    endif;
});

Route::get('panel', array(
	'as'=>'PanelController', 
	'uses'=>'PanelController@index', 
	'before' => 'auth', function(){ return Redirect::to('login'); }
));

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('profile', 'HomeController@profile');

Route::post('api/propinsi', 'Masters\PropinsiController@search');
Route::post('api/kota', 'Masters\KotaController@search');
Route::post('api/kecamatan', 'Masters\KecamatanController@search');
Route::post('api/karyawan', 'Masters\KaryawanController@search');
Route::post('api/pelanggan', 'Masters\PelangganController@search');

Route::get('master/menu', 'Masters\MenuController@index');
Route::get('api/menu', 'Masters\MenuController@menuGrid');
Route::get('master/menu/new', 'Masters\MenuController@menuNew');
Route::post('master/menu/save/{id}', 'Masters\MenuController@menuSave');
Route::get('master/menu/edit/{id}', 'Masters\MenuController@menuEdit');
Route::get('master/menu/delete/{id}', 'Masters\MenuController@menuDelete');

Route::get('master/bagian', 'Masters\BagianController@index');
Route::get('master/bagian/grid', 'Masters\BagianController@bagianGrid');
Route::get('master/bagian/new', 'Masters\BagianController@bagianNew');
Route::post('master/bagian/save/{id}', 'Masters\BagianController@bagianSave');
Route::get('master/bagian/edit/{id}', 'Masters\BagianController@bagianEdit');
Route::get('master/bagian/delete/{id}', 'Masters\BagianController@bagianDelete');

Route::get('master/barang', 'Masters\BarangController@index');
Route::get('master/barang/grid', 'Masters\BarangController@barangGrid');
Route::get('master/barang/new', 'Masters\BarangController@barangNew');
Route::post('master/barang/save/{id}', 'Masters\BarangController@barangSave');
Route::get('master/barang/edit/{id}', 'Masters\BarangController@barangEdit');
Route::get('master/barang/delete/{id}', 'Masters\BarangController@barangDelete');

Route::get('master/supplier', 'Masters\SupplierController@index');
Route::get('master/supplier/grid', 'Masters\SupplierController@grid');
Route::get('master/supplier/new', 'Masters\SupplierController@create');
Route::post('master/supplier/save/{id}', 'Masters\SupplierController@store');
Route::get('master/supplier/edit/{id}', 'Masters\SupplierController@edit');
Route::get('master/supplier/delete/{id}', 'Masters\SupplierController@delete');

Route::get('master/negara', 'Masters\NegaraController@index');
Route::get('master/negara/grid', 'Masters\NegaraController@grid');

Route::get('master/propinsi', 'Masters\PropinsiController@index');
Route::get('master/propinsi/grid', 'Masters\PropinsiController@grid');

Route::get('master/kota', 'Masters\KotaController@index');
Route::get('master/kota/grid', 'Masters\KotaController@grid');

Route::get('master/kecamatan', 'Masters\KecamatanController@index');
Route::get('master/kecamatan/grid', 'Masters\KecamatanController@grid');

Route::get('master/grade', 'Masters\GradeController@index');
Route::get('master/grade/grid', 'Masters\GradeController@grid');

Route::get('master/karyawan', 'Masters\KaryawanController@index');
Route::get('master/karyawan/grid', 'Masters\KaryawanController@grid');
Route::get('master/karyawan/new', 'Masters\KaryawanController@create');
Route::post('master/karyawan/save/{id}', 'Masters\KaryawanController@store');
Route::get('master/karyawan/edit/{id}', 'Masters\KaryawanController@edit');

Route::get('master/gudang', 'Masters\GudangController@index');
Route::get('master/gudang/grid', 'Masters\GudangController@grid');
Route::get('master/gudang/new', 'Masters\GudangController@create');
Route::post('master/gudang/save/{id}', 'Masters\GudangController@store');
Route::get('master/gudang/edit/{id}', 'Masters\GudangController@edit');

Route::get('master/kelompok', 'Masters\KelompokController@index');
Route::get('master/kelompok/grid', 'Masters\KelompokController@grid');
Route::get('master/kelompok/new', 'Masters\KelompokController@create');
Route::post('master/kelompok/save/{id}', 'Masters\KelompokController@store');
Route::get('master/kelompok/edit/{id}', 'Masters\KelompokController@edit');
Route::get('master/kelompok/delete/{id}', 'Masters\KelompokController@destroy');

Route::get('master/kelompok-barang', 'Masters\KelompokBarangController@index');
Route::get('master/kelompok-barang/grid', 'Masters\KelompokBarangController@grid');
Route::get('master/kelompok-barang/new', 'Masters\KelompokBarangController@create');
Route::post('master/kelompok-barang/save/{id}', 'Masters\KelompokBarangController@store');
Route::get('master/kelompok-barang/edit/{id}', 'Masters\KelompokBarangController@edit');
Route::get('master/kelompok-barang/delete/{id}', 'Masters\KelompokBarangController@destroy');

Route::get('master/merk', 'Masters\MerkController@index');
Route::get('master/merk/grid', 'Masters\MerkController@grid');
Route::get('master/merk/new', 'Masters\MerkController@create');
Route::post('master/merk/save/{id}', 'Masters\MerkController@store');
Route::get('master/merk/edit/{id}', 'Masters\MerkController@edit');
Route::get('master/merk/delete/{id}', 'Masters\MerkController@destroy');

Route::get('master/target', 'Masters\TargetController@index');
Route::get('master/target/grid', 'Masters\TargetController@grid');
Route::get('master/target/new', 'Masters\TargetController@create');
Route::post('master/target/save/{id}', 'Masters\TargetController@store');
Route::get('master/target/edit/{id}', 'Masters\TargetController@edit');
Route::get('master/target/delete/{id}', 'Masters\TargetController@destroy');

Route::get('master/pelanggan', 'Masters\PelangganController@index');
Route::get('master/pelanggan/grid', 'Masters\PelangganController@grid');
Route::get('master/pelanggan/new', 'Masters\PelangganController@create');
Route::post('master/pelanggan/save/{id}', 'Masters\PelangganController@store');
Route::get('master/pelanggan/edit/{id}', 'Masters\PelangganController@edit');
Route::get('master/pelanggan/delete/{id}', 'Masters\PelangganController@destroy');

Route::get('master/toko', 'Masters\TokoController@index');
Route::get('master/toko/grid', 'Masters\TokoController@grid');
Route::get('master/toko/new', 'Masters\TokoController@create');
Route::post('master/toko/save/{id}', 'Masters\TokoController@store');
Route::get('master/toko/edit/{id}', 'Masters\TokokController@edit');
Route::get('master/toko/delete/{id}', 'Masters\TokoController@destroy');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
