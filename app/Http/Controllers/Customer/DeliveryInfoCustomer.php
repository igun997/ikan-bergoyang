<?php

namespace App\Http\Controllers\Customer;

use App\DetailTransaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retur;
use App\Transaksi;
use Illuminate\Support\Facades\Validator;

class DeliveryInfoCustomer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // echo($input['noresi']);
        // dd();

        $validate = Validator::make($input, [
            'noresi' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        } else {
            $retur = Retur::where('id', $input['id'])->update([
                'status' => 11,
                'noresi' => $input['noresi']
            ]);
            $transaksi = Transaksi::where('id', $input['transaksi_id'])->update(['status' => 11]);

            if($retur && $transaksi) {
                return redirect()->to('/order')->with('message', 'Nomor resi berhasil diinput');
            } else {
                return redirect()->back()->with('error', 'Nomor resi gagal diinput.')->withInput($input);
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
        $data['retur'] = Retur::where('id', $id)->first();
        return view('customer.retur.delivery-info', $data);
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
    public function update(Request $request)
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
        //
    }
}
