<?php

namespace App\Http\Controllers\Customer;
use App\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{

	public function index()
    {
        return view('customer.pemesanan');
    }

    public function show($id)
    {
        // $data['pemesanan'] = Pemesanan::find($id);
        // dd($data['pemesanan']);
        // return view('admin.transaksi.show', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'nama' => 'required',
            'no_hp' => 'required',
			'email' => 'email|required',
            'warna' => 'required',
            'ukuran' => 'required',
            'bahan' => 'required',
            'alamat' => 'required',
            'jumlah' => 'required',
            'gambar' => 'sometimes|mimes:png,jpeg,jpg'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            if ($request->has('gambar')) {
                $imageName = 'pemesanan'.'-'.time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $tujuan_upload = 'uploads/pemesanan';
            	$request->file('gambar')->move($tujuan_upload,$imageName);
            	$input["gambar"] = $imageName;
            }

            $query = Pemesanan::create($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data barang berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Data barang gagal ditambahkan.')->withInput($input);
            }
        }
    }
//      public function checkout(Request $request)
//     {
//         $input = $request->all();

//         $validate = Validator::make($input, [
//             'nama' => 'required',
//             'no_hp' => 'required',
//				'email' => 'email|required',
//             'warna' => 'required',
//             'ukuran' => 'required',
//             'bahan' => 'required',
//             'alamat' => 'required',
//             'jumlah' => 'required',
//         ]);
//      if($validate->fails()){
//             return redirect()->back()->withErrors($validate->errors())->withInput($input);
//         }else{
//             unset($input['_token']);
//             $carts = Cart::where('user_id', auth()->user()->id)->get();
//             if($carts->count() == 0){
//                 return redirect('cart')->with('error', 'Checkout gagal! tidak ada produk dalam cart.');
//             }
// }
}