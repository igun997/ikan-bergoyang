<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\DetailPermintaan;
use App\DetailRetur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Supplier;
use Barryvdh\DomPDF\Facade as PDF;

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
        $data['returs'] = Pembelian::where('status', 'Menunggu acc pemilik')->orderBy('created_at', 'desc')->get();
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

    public function formRetur($id)
    {
        $data['title'] = "Detail";
        $data['url'] = url('/admin/pembelian');
        $data['suppliers'] = Supplier::all();
        $data['pembelian'] = Pembelian::where('idpembelian', $id)->first();
        $data['details'] = DetailPermintaan::where('idpembelian', $data['pembelian']->idpermintaan)->get();
        // $data['kodebarangs'] = array();
        // foreach($data['details'] as $detail) {
        //     array_push($data['kodebarangs'], $detail->idbarang);
        // }
        // echo($data['details']->idbarang);
        // print_r($data['kodebarangs']);
        // dd();
        return view('admin.retur.form-retur', $data);
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

    public function prosesRetur(Request $request, $id)
    {
        $input = $request->all();
        $idp = $request->get('idpembelian');

        foreach($request->get('qty') as $idbarang => $qty) {
            echo($qty);
        }

        $validate = Validator::make($input, [
            'idpembelian' => 'required',
            'idbarang.*' => 'required',
            'qty.*' => 'required'
        ]);
        // print_r($input);
        // echo($idp);
        dd();

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        } else {
            $pembelian = Pembelian::where('idpembelian', $id)->first();
            $query = DetailRetur::create($input);
            if($pembelian && $query) {
                $stat = Pembelian::where('idpembelian', $pembelian->idpembelian)->update(['status' => 'Menunggu acc pemilik']);
                if ($stat) {
                    return redirect()->to('admin/retur-pembelian')->with('info', 'Retur berhasil diproses');
                } else {
                    return redirect()->to('admin/pembelian')->with('error', 'Retur gagal diproses');
                }
            } else {
                return redirect()->to('/pembelian')->with('error', 'Terjadi kesalahan');
            }

        }

        // if($pembelian->idpermintaan) {
        //     $detail = DetailPermintaan::where('idpembelian', $pembelian->idpermintaan)->first();
        //     if($detail) {
        //         $barang = Barang::where('id', $detail->idbarang)->first();
        //         $qty = $barang->stok - $detail->qty;
        //         $update = Barang::where('id', $detail->idbarang)->update(['stok' => $qty]);
        //         echo($pembelian);
        //     } else {
        //         return redirect()->to('admin/pembelian')->with('error', 'Proses retur gagal');
        //     }
        // } else {
        //     return redirect()->to('admin/pembelian')->with('error', 'Proses retur gagal');
        // }
    }

    public function confirmRetur($id)
    {
        $details = DetailRetur::where('idpembelian', $id)->get();
        $countst = 0;

        foreach($details as $detail) {
            $barang = Barang::where('id', $detail->idbarang)->first();
            
            if ($barang) {
                $stok = $barang->stok - $detail->qty;
                $update = Barang::where('id', $detail->idbarang)->update(['stok' => $stok]);
                
                if ($update) {
                    $pembelian = Pembelian::where('idpembelian', $id)->first();
                    
                    if ($pembelian) {
                        $stat = Pembelian::where('idpembelian', $pembelian->idpembelian)->update(['status' => 'Retur barang']);
                        
                        if ($stat) {
                            $countst++;
                        }
                    } else {
                        return redirect()->to('/retur-pembelian')->with('error', 'Terjadi kesalahan');
                    }
                }
            } else {
                return redirect()->to('admin/retur-pembelian')->with('error', 'Terjadi kesalahan');
            }
        }
        if ($countst != 0) {
            return redirect()->to('admin/retur-pembelian')->with('info', 'Retur berhasil di acc');
        } else {
            return redirect()->to('admin/retur-pembelian')->with('error', 'Retur gagal di acc');
        }
    }

    public function rejectRetur($id)
    {
        $pembelian = Pembelian::where('idpembelian', $id)->first();
        if($pembelian) {
            $stat = Pembelian::where('idpembelian', $pembelian->idpembelian)->update(['status' => 'Barang sudah diterima']);
            $del = DetailRetur::where('idpembelian', $id)->delete();
            if ($stat && $del) {
                return redirect()->to('admin/retur-pembelian')->with('info', 'Retur berhasil ditolak');
            } else {
                return redirect()->to('admin/pembelian')->with('error', 'Retur gagal ditolak');
            }
        } else {
            return redirect()->to('/pembelian')->with('error', 'Terjadi kesalahan');
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
