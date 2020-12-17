<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\DetailPembelian;
use App\DetailPermintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Pembelian;
use App\Permintaan;

class PermintaanController extends Controller
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
        $temp = Permintaan::where('istemp', 1);
        foreach($temp->get() as $t){
            DetailPermintaan::where('idpembelian', $t->id)->delete();
        }
        $temp->delete();
    }
    
    public function index()
    {
        $this->clearTemp();
        $data['transaksis'] = Permintaan::orderBy('created_at', 'desc')->where('istemp', 0)->get();
        return view('admin.permintaan.index', $data);
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
        $data['url'] = url('/admin/permintaan');
        $data['nostruk'] = Permintaan::max('id') + 1;
        Permintaan::create([
            'id'            => $data['nostruk'], 
            'iduser'        => auth()->user()->id,
            'istemp'        => 1,
            'idstatus'      => 1,
        ]);
        // $data['temp'] = DetailPembelian::where('idpembelian', $data['nostruk'])->get();
        return view('admin.permintaan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Permintaan::where('id', $request->id)->update([
            'iduser'        => auth()->user()->id,
            'istemp'        => 0
        ]);

        return redirect()->to('admin/permintaan')->with(['info' => "Permintaan berhasil ditambahkan"]);
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
        $transaksi = Permintaan::findOrFail($id);
        $query = $transaksi->update(['istemp' => 2]);

        if ($query) {
            return redirect()->back()->with('info', 'Data permintaan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data permintaan gagal dihapus.');
        }
    }

    public function getPembelianList($id){
        $data = DetailPermintaan::where('idpembelian', $id)->get();
        foreach($data as $d){
            $d->barang = Barang::where('id', $d->idbarang)->first();
        }

        return response()->json(['data' => $data]);
    }

    public function getDataBarang($kodebarang){
        $data = Barang::where('kodebarang', $kodebarang)->first();
        $data['kategori'] = Kategori::where('id', $data['kategori_id'])->first()->nama_kategori;

        return response()->json(['data' => $data]);
    }

    public function addBarang(Request $request){
        $idbarang = Barang::where('kodebarang', $request->kodebarang)->first()->id;
        DetailPermintaan::create([
            'id'            => DetailPermintaan::max('id') + 1,
            'idpembelian'   => $request->idpembelian,
            'idbarang'      => $idbarang,
            'qty'           => $request->qty
        ]);

        return response()->json(['success' => true]);
    }
}
