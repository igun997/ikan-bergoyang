<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\DetailPembelian;
use App\DetailPermintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Pembelian;
use App\Penerimaan;
use App\Supplier;
use App\Transaksi;
use Barryvdh\DomPDF\Facade as PDF;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function index()
    {
        $data['transaksis'] = Pembelian::orderBy('created_at', 'desc')->get();
        foreach($data['transaksis'] as $t){
            $isdeliver = Penerimaan::where('idpembelian', $t->id)->first();
            if($isdeliver){
                $t->status = "Barang sudah diterima";
            }else{
                $t->status = "Proses Pemesanan ke Supplier";
            }
        }
        return view('admin.pembelian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah";
        $data['url'] = url('/admin/pembelian');
        $data['nostruk'] = $this->generateRandomString(10);
        $data['suppliers'] = Supplier::where('isdelete', 0)->get();

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
        $id = $this->generateRandomString(10);
        Pembelian::create([
            'idpembelian'   => $id,
            'idpermintaan'  => $request->idpermintaan, 
            'idsupplier'    => $request->idsupplier, 
            'totalharga'    => $request->totalharga, 
            'keterangan'    => $request->keterangan
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
        $data['title'] = "Detail";
        $data['url'] = url('/admin/pembelian');
        $data['suppliers'] = Supplier::all();
        $data['pembelian'] = Pembelian::where('idpembelian', $id)->first();
        $isdeliver = Penerimaan::where('idpembelian', $id)->first();
        if($isdeliver){
            $data['pembelian']['status'] = "Barang sudah diterima";
        }else{
            $data['pembelian']['status'] = "Proses Pemesanan ke Supplier";
        }

        // $data['temp'] = DetailPembelian::where('idpembelian', $data['nostruk'])->get();
        return view('admin.pembelian.form', $data);
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
        $transaksi = Permintaan::findOrFail($id);
        $query = $transaksi->update(['istemp' => 2]);

        if ($query) {
            return redirect()->back()->with('info', 'Data permintaan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data permintaan gagal dihapus.');
        }
    }

    public function terimaBarang($id){
        Penerimaan::create([
            'idpembelian'   => $id, 
            'iduser'        => auth()->user()->id
        ]);

        $idpermintaan = Pembelian::where('idpembelian', $id)->first()->idpermintaan;
        $barang = DetailPermintaan::where('idpembelian', $idpermintaan)->get();
        foreach($barang as $b){
            $stok = Barang::where('id', $b->idbarang)->first()->stok;
            Barang::where('id', $b->idbarang)->update([
                'stok' => $stok + $b->qty
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function printFaktur($id){
        $data = Pembelian::where('idpembelian', $id)->first();
        $idpermintaan = $data['idpermintaan'];
        $detail = DetailPermintaan::where('idpembelian', $idpermintaan)->get();

        $pdf = PDF::loadview('admin.pembelian.faktur', ['pembelian' => $data, 'produk' => $detail]);
    	return $pdf->download('faktur-pembelian-'.$id);
    }
}
