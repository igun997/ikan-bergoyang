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

Route::auth();
// Route::get('/', function(){
//     return redirect('/produk');
// });
Route::get('/', 'Customer\HomeController@index');
Route::get('/produk', 'Customer\ProdukController@index');
Route::get('/produk/{id}', 'Customer\ProdukController@show');
Route::get('/register', 'Auth\RegisterController@index');
// Route::get('retur', 'Customer\CustomerReturController@index');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'can:isAdmin', 'prefix' => 'admin'], function(){
        Route::get('/', function(){
            return redirect('admin/transaksi');
        });
        Route::resource('/transaksi', 'Admin\TransaksiController');
        Route::get('/pembayaran', 'Admin\TransaksiController@listKonfirmasiPembayaran');
        Route::get('/confirm-pembayaran/{id}', 'Admin\TransaksiController@confirmPayment');
        Route::get('/reject-pembayaran/{id}', 'Admin\TransaksiController@rejectPayment');
        Route::get('/pengiriman', 'Admin\TransaksiController@listPengirimanResi');
        Route::post('/pengiriman', 'Admin\TransaksiController@saveResi');
        Route::resource('/barang', 'Admin\BarangController');
        Route::resource('/kategori', 'Admin\KategoriController');
        Route::resource('/user', 'Admin\UserController');
        Route::resource('/supplier', 'Admin\SupplierController');
        Route::resource('/daftarpemesanan', 'Admin\DaftarPemesananController');

        Route::resource('/permintaan', 'Admin\PermintaanController');
        Route::get('/pembelian-list/{id}', 'Admin\PermintaanController@getPembelianList');
        Route::get('/get-barang/{kodebarang}', 'Admin\PermintaanController@getDataBarang');
        Route::post('/tambah-barang-pembelian', 'Admin\PermintaanController@addBarang');

        Route::resource('/pembelian', 'Admin\PembelianController');
        Route::get('/penerimaan/{id}', 'Admin\PembelianController@terimaBarang');
        Route::get('/pembelian/{id}/print', 'Admin\PembelianController@printFaktur');
        
        Route::resource('retur', 'Admin\AdminReturController');
        Route::get('/confirm-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@confirmRetur');
        Route::get('/reject-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@rejectRetur');
    });
    Route::group(['middleware' => 'can:isCustomer'], function(){
        Route::post('/cart/checkout', 'Customer\CartController@checkout');
        Route::resource('/cart', 'Customer\CartController');
        Route::get('/checkout', 'Customer\CheckoutController@index');
        Route::post('/cek-ongkir', 'Customer\CheckoutController@getOngkir');
        Route::post('/checkout', 'Customer\CheckoutController@checkout');
        Route::post('/confirm-payment/{id}', 'Customer\PaymentInfoController@confirm');
        Route::get('/payment-info/{id}', 'Customer\PaymentInfoController@index');
        Route::get('/order', 'Customer\OrderController@index');
        Route::get('/order/{id}', 'Customer\OrderController@detail');
        Route::resource('/pemesanan','Customer\PemesananController');
        // Route::get('/upload', 'Customer\UploadController@upload');
        // Route::post('/upload/proses', 'Customer\UploadController@proses_upload');
        Route::get('/confirm-accept/{id}', 'Customer\OrderController@accept');

        Route::get('/get-kota/{idprovinsi}', 'Customer\CheckoutController@getKota');

        Route::get('profil', 'Customer\ProfilController@index');
        Route::get('profil/edit', 'Customer\ProfilController@edit');
        Route::post('profil/update', 'Customer\ProfilController@update');
        
        Route::resource('retur', 'Customer\CustomerReturController');
    });
});

Route::get('/tesemail', 'Customer\ProdukController@tesemail');