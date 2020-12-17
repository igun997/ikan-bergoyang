<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentInfoController extends Controller
{
    public function index($id)
    {
        $data['transaksi'] = Transaksi::findOrFail($id);
        $data['transaksi']['kadaluarsabayar'] = Carbon::parse($data['transaksi']['kadaluarsabayar'])->format('d M Y H:i');
        return view('customer.payment-info', $data);
    }

    public function confirm(Request $request, $id){
    	$input = $request->all();
    	$transaksi = Transaksi::where('id', $id);
    	if ($request->has('buktipembayaran')) {
            $imageName = $id.'-'.time() . '.' . $input['buktipembayaran']->getClientOriginalExtension();
            $input['buktipembayaran']->storeAs('barang', $imageName, 'public_uploads');
            $input['buktipembayaran'] = $imageName;
        }
    	$update = $transaksi->update(['status' => 2, 'buktipembayaran' => $imageName]);

		return redirect()->to('order')->with(['info' => 'Bukti Pembayaran Berhasil dikirimkan']);
    }
}