<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\DetailTransaksi;
use App\Retur;
use Illuminate\Support\Facades\DB;

class CustomerReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $id = $request->get('transaksi_id');

        $validate = Validator::make($input, [
            'transaksi_id' => 'required',
            'reason' => 'required',
            'bukti_barang' => 'required|mimes:png,jpeg,jpg',
            'status' => 'required',
            'user_id' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            if ($request->has('bukti_barang')) {
                $imageName = 'retur'.'-'.$input['transaksi_id'].'-'.time() . '.' . $input['bukti_barang']->getClientOriginalExtension();
                $input['bukti_barang']->storeAs('bukti-barang', $imageName, 'public_uploads');
                $input['bukti_barang'] = $imageName;
            }

            $stat = Transaksi::where('id', $id)->update(['status' => $input['status']]);

            $query = Retur::create($input);

            if ($query && $stat) {
                return redirect()->to('/order')->with('info', 'Retur Berhasil Diajukan');
            } else {
                return redirect()->back()->with('error', 'Pengajuan Retur Gagal.')->withInput($input);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['transaksi'] = Transaksi::where('id', $id)->first();
        $data['detail_transaksi'] = DetailTransaksi::where('transaksi_id', $id)->first();
        return view('customer.retur.pengajuan-retur', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cancel = Retur::where('id', $id);
        $transaksi = Retur::where('id', $id)->get('transaksi_id')->first();
        $stat = Transaksi::where('id', $transaksi->transaksi_id)->update(['status' => 5]);
        $query = $cancel->delete();
        if ($query && $stat) {
            return redirect()->back()->with('info', 'Data retur berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data retur gagal dihapus.');
        }
    }

}
