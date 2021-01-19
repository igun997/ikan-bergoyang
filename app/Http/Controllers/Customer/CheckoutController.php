<?php

namespace App\Http\Controllers\Customer;

use App\Barang;
use App\Cart;
use App\Delivery;
use App\DetailTransaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kota;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Tesemeil;
use App\Provinsi;
use App\User;
use Carbon\Carbon;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::with('barang')->where('user_id', auth()->user()->id)->get();
        $totalPayment = 0;
        foreach($data['carts'] as $cart){
            $totalPayment += $cart->qty * $cart->barang->harga;
        }
        $data['totalPayment'] = $totalPayment;
        $data['delivery'] = null;
        $data['provinsi']   = Provinsi::all();
        $data['kota']       = Kota::where('idprovinsi', $data['delivery']['detail']['idprovinsi'])->get();
        return view('customer.checkout', $data);
    }

    public function getKota($idprovinsi){
        $data = Kota::where('idprovinsi', $idprovinsi)->get();
        return response()->json($data);
    }

    public function getOngkir(Request $request){
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }

    public function checkout(Request $request)
    {
        $input = $request->all();
        $ongkir = $input['ongkir'];

        $validate = Validator::make($input, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'email|required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else{
            unset($input['_token']);
            unset($input['ongkir']);
            $carts = Cart::where('user_id', auth()->user()->id)->get();
            if($carts->count() == 0){
                return redirect('cart')->with('error', 'Checkout gagal! tidak ada produk dalam cart.');
            }

            //create or update delivery data
            $input['user_id'] = auth()->user()->id;
            $delivery = Delivery::updateOrCreate($input, $input);

            $totalPayment = 0;
            foreach($carts as $key => $cart){
                $totalPayment += $cart->qty * $cart->barang->harga;
            }
            $totalPayment += $ongkir;

            //create transaksi data
            $transaksi['user_id'] = auth()->user()->id;
            $transaksi['delivery_id'] = $delivery->id;
            $transaksi['status'] = 1;
            $transaksi['total_harga'] = $totalPayment;
            $transaksi['kadaluarsabayar'] = Carbon::now()->addDays(2)->toDateTimeString();
            $queryTransaksi = Transaksi::create($transaksi);

            //create detail transaksi data
            foreach($carts as $cart){
                $data['barang_id'] =  $cart->barang_id;
                $data['qty'] =  $cart->qty;
                $data['transaksi_id'] =  $queryTransaksi->id;
                $query = DetailTransaksi::create($data);

                $stoknow = Barang::where('id', $cart->barang_id)->first()->stok;
                Barang::where('id', $cart->barang_id)->update(['stok' => $stoknow - $data['qty']]);
            }

            if($query){
                $carts = Cart::where('user_id', auth()->user()->id);
                $carts->delete();
                $details = [
                    'title' => 'Email dari JS Collection',
                    'body' => 'Anda berhasil checkout. Harap melakukan pembayaran pada no. rekening berikut.',
                    'kadaluarsabayar' => Carbon::parse($transaksi['kadaluarsabayar'])->format('d M Y H:i')
                ];

                Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
                return redirect('/payment-info/'.$queryTransaksi->id)->with('info', 'Checkout berhasil!');
            }else{
                return redirect()->back()->with('error', 'Data checkout gagal disimpan.')->withInput($input);
            }
        }
    }
}
