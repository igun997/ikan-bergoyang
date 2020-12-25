<?php

namespace App\Http\Controllers\Customer;

use App\Transaksi;
use App\Http\Controllers\Controller;
use App\Retur;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        $retur = Retur::where('user_id', auth()->user()->id)->get();
        // $transaksi_id = [];
        foreach($transaksi as $order){
            if($now > $order->kadaluarsabayar && $order->status == 1)
            $order->status = 6;
        }
        $data['returs'] = $retur;
        $data['orders'] = $transaksi;
        return view('customer.order', $data);
    }

    public function detail($id){
        $data['transaksi'] = Transaksi::where('id', $id)->first();
        $data['retur'] = Retur::where('transaksi_id', $id)->first();
        return view('customer.order-detail', $data);
    }

    public function accept($id){
    	$transaksi = Transaksi::where('id', $id);
    	$update = $transaksi->update(['status' => 5]);

		return redirect()->back()->with(['info' => 'Barang telah diterima!']);
    }
}
