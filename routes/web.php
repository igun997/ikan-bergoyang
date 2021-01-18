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
        //pemilik
        Route::resource('/user', 'Admin\UserController');

        //gudang
        Route::resource('/barang', 'Admin\BarangController');
        Route::resource('/kategori', 'Admin\KategoriController');
        Route::resource('/supplier', 'Admin\SupplierController');
        Route::resource('/daftarpemesanan', 'Admin\DaftarPemesananController');

        #po
        Route::prefix("po")->namespace("Admin")->name("po.")->group(function (){
            Route::get("/","PoController@index")->name("list");
            Route::get("/add","PoController@add")->name("add");
            Route::post("/add","PoController@add_action")->name("add.action");
            Route::get("/detail/{id}","PoController@detail")->name("detail");
            Route::get("/barang/{id}","PoController@barang")->name("barang");
            Route::get("/barang/{id}/add","PoController@barang_add")->name("barang.add");
            Route::get("/barang/{id}/delete/{id_barang}","PoController@barang_delete")->name("barang.delete");
            Route::post("/barang/{id}/add","PoController@barang_add_action")->name("barang.add.action");
            Route::get("/update_status/{id?}","PoController@update_status")->name("update_status");
            Route::get("/penerimaan/{id}","PoController@penerimaan")->name("penerimaan");
            Route::post("/penerimaan/{id}/add","PoController@penerimaan_add_action")->name("penerimaan.add.action");

        });


        //penjualan
        Route::resource('/transaksi', 'Admin\TransaksiController');
        Route::get('/pembayaran', 'Admin\TransaksiController@listKonfirmasiPembayaran');
        Route::get('/confirm-pembayaran/{id}', 'Admin\TransaksiController@confirmPayment');
        Route::get('/reject-pembayaran/{id}', 'Admin\TransaksiController@rejectPayment');
        Route::get('/pengiriman', 'Admin\TransaksiController@listPengirimanResi');
        Route::post('/pengiriman', 'Admin\TransaksiController@saveResi');
        Route::post('/retur-pengiriman', 'Admin\TransaksiController@saveResiRetur');
        Route::get('/transaksi-report', 'Admin\TransaksiController@report');
        Route::get('/transaksi/report/monthly/{bulan}/{tahun}', 'Admin\TransaksiController@reportMonthly');

        Route::resource('retur', 'Admin\AdminReturController');
        Route::get('/detail-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@show');
        Route::get('/confirm-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@confirmRetur');
        Route::get('/reject-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@rejectRetur');
        Route::get('/proses-retur/{idRetur}/{idTransaksi}', 'Admin\AdminReturController@prosesRetur');
        Route::get('/get-retur/{idRetur}', 'Admin\AdminReturController@getRetur');

        #region Laporan
        Route::get('report/barang', 'Admin\BarangController@exportLaporan')->name('admin.report.barang');
        Route::get('report/retur-penjualan', 'Admin\AdminReturController@exportLaporan')->name('report.retur-penjualan');
        #endregion
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
        Route::get('/confirm-accept-retur/{idTransaksi}/{idRetur}', 'Customer\OrderController@acceptWithRetur');

        Route::get('/get-kota/{idprovinsi}', 'Customer\CheckoutController@getKota');

        Route::get('profil', 'Customer\ProfilController@index');
        Route::get('profil/edit', 'Customer\ProfilController@edit');
        Route::post('profil/update', 'Customer\ProfilController@update');

        Route::resource('retur', 'Customer\CustomerReturController');
        Route::resource('delivery-info', 'Customer\DeliveryInfoCustomer');
    });
});

Route::get('/tesemail', 'Customer\ProdukController@tesemail');
