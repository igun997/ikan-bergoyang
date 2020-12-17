<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function clearTemp(){
        $temp = Pembelian::where('istemp', 1);
        foreach($temp->get() as $t){
            DetailPembelian::where('idpembelian', $t->id)->delete();
        }
        $temp->delete();
    }
    
    public function index()
    {
        $this->clearTemp();
        $data['transaksis'] = Pembelian::orderBy('created_at', 'desc')->get();
        return view('admin.pembelian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->clearTemp();
        $data['title'] = "Tambah";
        $data['url'] = url('/admin/pembelian');
        $data['nostruk'] = Pembelian::max('id') + 1;
        Pembelian::create([
            'id'            => $data['nostruk'], 
            'totalharga'    => 0, 
            'keterangan'    => "", 
            'iduser'        => auth()->user()->id,
            'istemp'        => 1
        ]);
        // $data['temp'] = DetailPembelian::where('idpembelian', $data['nostruk'])->get();
        return view('admin.pembelian.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembelian::where('id', $request->id)->update([
            'totalharga'    => $request->totalharga,
            'keterangan'    => $request->keterangan,
            'iduser'        => auth()->user()->id,
            'istemp'        => 0
        ]);

        return redirect()->to('admin/pembelian')->with(['info' => "Transaksi Pembelian berhasil ditambahkan"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
