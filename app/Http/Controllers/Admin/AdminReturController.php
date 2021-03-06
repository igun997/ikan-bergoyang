<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Tesemeil;
use App\Retur;
use App\Transaksi;
use App\TransaksiStatus;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class AdminReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Retur Penjualan';
        $data['returs'] = Retur::all();
        return view('admin.retur.index',$data);
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
        $data['retur'] = Retur::find($id);
        return view('admin.retur.detail', $data);
    }
    public function getRetur($id)
    {
        $data = Retur::with(['transaksi','transaksi.detail','transaksi.detail.barang','user','transaksistatus','delivery'])->find($id);
        return response()->json($data);
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

    public function confirmRetur($idRetur, $idTransaksi){
        $retur = Retur::where('id', $idRetur)->update(['status' => 9]);
        $transaksi = Transaksi::where('id', $idTransaksi)->update(['status' => 9]);
        if($transaksi && $retur){
            $details = [
                'title' => 'Email dari BUJANG Collection',
                'body' => 'Permintaan retur anda berhasil dikonfirmasi. Harap mengirim barang kembali ke alamat berikut:
                Jl. Otitsta, Gg.Anggrek, Subang, Jawa Barat.',
            ];
            Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
            return redirect()->back()->with(['info' => 'Retur berhasil dikonfirmasi']);
        }
    }

    public function rejectRetur($idRetur, $idTransaksi){
        $retur = Retur::where('id', $idRetur)->update(['status' => 10]);
        $transaksi = Transaksi::where('id', $idTransaksi)->update(['status' => 5]);
        if($transaksi && $retur){
            $details = [
                'title' => 'Email dari BUJANG Collection',
                'body' => 'Permintaan retur anda ditolak.',
            ];
            Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
            return redirect()->back()->with(['info' => 'Retur ditolak']);
        }
    }

    public function prosesRetur($idRetur, $idTransaksi){
        $retur = Retur::where('id', $idRetur)->update(['status' => 12]);
        $transaksi = Transaksi::where('id', $idTransaksi)->update(['status' => 12]);
        if($transaksi && $retur){
            $details = [
                'title' => 'Email dari BUJANG Collection',
                'body' => 'Permintaan retur anda sedang di proses dan barang akan segera dikirimkan.',
            ];
            Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
            return redirect()->back()->with(['info' => 'Retur diproses']);
        }
    }


    public function exportLaporan(){
        $retur = new Retur();
        if(!empty(request()->status)){
            $status = request()->status;
            $retur = $retur->where('status', $status);
        }
        if(!empty(request()->start)){
            $start = request()->start;
            $retur = $retur->where('created_at', '>=', $start);
        }
        if(!empty(request()->end)){
            $end = request()->end;
            $retur = $retur->where('created_at', '<=', $end);
        }

        $data['returs'] = $retur->get();

        // return view('admin.retur.laporan', $data);
        set_time_limit(300);
        $pdf = PDF::loadView('admin.retur.laporan', $data);
        return $pdf->setPaper('a4', 'portrait')->download('laporan retur penjualan.pdf');
    }
}
