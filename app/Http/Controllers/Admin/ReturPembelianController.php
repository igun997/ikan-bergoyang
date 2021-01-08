<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\DetailPermintaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembelian;
use Barryvdh\DomPDF\Facade as PDF;
use Dotenv\Validator;

class ReturPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transaksis'] = Pembelian::where('status', 'Retur barang')->orderBy('created_at', 'desc')->get();
        return view('admin.retur.pembelian', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['retur'] = Pembelian::where('idpembelian', $id)->first();
        return view('admin.retur.show', $data);
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

    public function prosesRetur($id)
    {
        $pembelian = Pembelian::where('idpembelian', $id)->first();
        if($pembelian->idpermintaan) {
            $detail = DetailPermintaan::where('idpembelian', $pembelian->idpermintaan)->first();
            if($detail) {
                $barang = Barang::where('id', $detail->idbarang)->first();
                $qty = $barang->stok - $detail->qty;
                $update = Barang::where('id', $detail->idbarang)->update(['stok' => $qty]);
                if($pembelian && $update) {
                    $stat = Pembelian::where('idpembelian', $pembelian->idpembelian)->update(['status' => 'Retur barang']);
                    if ($stat) {
                        return redirect()->to('admin/retur-pembelian')->with('info', 'Proses retur berhasil');
                    } else {
                        return redirect()->to('admin/pembelian')->with('error', 'Proses retur gagal');
                    }
                } else {
                    return redirect()->to('/pembelian')->with('error', 'Terjadi kesalahan');
                }
                echo($pembelian);
            } else {
                return redirect()->to('admin/pembelian')->with('error', 'Proses retur gagal');
            }
        } else {
            return redirect()->to('admin/pembelian')->with('error', 'Proses retur gagal');
        }
    }    

    public function exportLaporan(){
        $retur = Pembelian::where('status', 'Retur barang');
        if(!empty(request()->start)){
            $start = request()->start;
            $retur = $retur->where('created_at', '>=', $start);
        }          
        if(!empty(request()->end)){
            $end = request()->end;
            $retur = $retur->where('created_at', '<=', $end);
        }     

        $data['returs'] = $retur->get();

        // return view('admin.pembelian.laporan-retur', $data);
        set_time_limit(300);
        $pdf = PDF::loadView('admin.pembelian.laporan-retur', $data);
        return $pdf->setPaper('a4', 'portrait')->download('laporan retur pembelian.pdf');
    }

}
