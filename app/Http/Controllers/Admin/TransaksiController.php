<?php

namespace App\Http\Controllers\Admin;

use App\Transaksi;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Tesemeil;
use App\Retur;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Transaksi Penjualan';
        $data['transaksis'] = Transaksi::all();
        return view('admin.transaksi.index', $data);
    }

    public function listKonfirmasiPembayaran()
    {
        $data['title'] = 'Daftar Pembayaran yang harus dikonfirmasi';
        $data['transaksis'] = Transaksi::whereIn('status', [1, 2, 7])->orderBy('created_at', 'desc')->get();
        return view('admin.transaksi.pembayaran', $data);
    }

    public function confirmPayment($id){
        $transaksi = Transaksi::where('id', $id)->update(['status' => 3]);
        if($transaksi){
            $details = [
                'title' => 'Email dari J&S Collection',
                'body' => 'Bukti Pembayaran Anda berhasil dikonfirmasi. Harap menunggu resi yang akan kami kirimkan untuk Anda.',
            ];
            Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
            return redirect()->back()->with(['info' => 'Pembayaran berhasil dikonfirmasi']);
        }
    }

    public function rejectPayment($id){
        $kadaluarsa = Carbon::now()->addDay()->toDateTimeString();
        $transaksi = Transaksi::where('id', $id)->update(['status' => 7, 'kadaluarsabayar' => $kadaluarsa]);
        if($transaksi){
            $details = [
                'title' => 'Email dari J&S Collection',
                'body' => 'Bukti Pembayaran Anda ditolak karena alasan tidak sesuai. Kirim ulang bukti pembayaran valid Anda sebelum' . Carbon::parse($kadaluarsa)->format('d M Y H:i'),
                'kadaluarsabayar' => Carbon::parse($kadaluarsa)->format('d M Y H:i')
            ];
            Mail::to('muhammadagungabdillah133@gmail.com')->send(new Tesemeil($details));
            return redirect()->back()->with(['info' => 'Pembayaran ditolak']);
        }
    }

    public function listPengirimanResi()
    {
        $data['title'] = 'Daftar Transaksi yang belum diproses pengirimannya';
        $data['transaksis'] = Transaksi::whereIn('status', [3])->orderBy('created_at', 'desc')->get();
        $data['returs'] = Retur::whereIn('status', [12])->orderBy('created_at', 'desc')->get();
        return view('admin.transaksi.pengiriman', $data);
    }

    public function saveResi(Request $request){
        $input = $request->all();
        $transaksi = Transaksi::where('id', $input['id'])->update([
            'status' => 4,
            'noresi' => $input['resi']
        ]);
        return redirect()->back()->with(['info' => 'No Resi berhasil dikirimkan']);
    }

    public function saveResiRetur(Request $request){
        $input = $request->all();
        $transaksi = Transaksi::where('id', $input['transaksi_id'])->update([
            'status' => 4,
            'noresi' => $input['noresi']
        ]);
        $retur = Retur::where('id', $input['id'])->update([
            'status' => 4,
            'noresi' => $input['noresi']
        ]);
        if($transaksi && $retur) {
            return redirect()->back()->with(['info' => 'No Resi berhasil dikirimkan']);
        } else {
            return redirect()->back()->with(['error' => 'No Resi gagal dikirimkan'])->withInput($input);
        }
    }

    public function show($id)
    {
        $data['transaksi'] = Transaksi::find($id);
        return view('admin.transaksi.show', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'status' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $transaksi = Transaksi::find($id);
            $query = $transaksi->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Status transaksi berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Status transaksi gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $query = $transaksi->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data transaksi berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data transaksi gagal dihapus.');
        }
    }

    public function report(){
        return view('admin.transaksi.report');
    }

    public function reportMonthly($bulan, $tahun){
        setlocale(LC_TIME, 'es_ES');
        $namabulan = $this->getNamaBulanIndo($bulan);
        // $data = Pembelian::whereMonth('created_at', $bulan)->orderBy('created_at', 'asc')->get();
        $query = "select a.tanggal, b.barang, b.stok, a.totalharga from (
            select date(a.created_at) as tanggal, sum(a.total_harga) as totalharga from transaksi a 
            inner join detail_transaksi c on a.id = c.transaksi_id
            where month(a.created_at) = $bulan and year(a.created_at) = $tahun and status = 5 group by date(a.created_at)
        ) a 
        inner join (
            select date(a.created_at) as tanggal, count(*) as barang, sum(c.qty) as stok from transaksi a 
            inner join detail_transaksi c on a.id = c.transaksi_id 
            where month(a.created_at) = $bulan and year(a.created_at) = $tahun and status = 5 GROUP BY date(a.created_at)
        ) b on a.tanggal = b.tanggal";
        $data = DB::select(DB::raw($query));

        $pdf = PDF::loadview('admin.transaksi.reportmonth', ['data' => $data, 'namabulan' => $namabulan, 'tahun' => $tahun]);
    	return $pdf->download('Report Pembelian di bulan ' . $namabulan . ' ' . $tahun);
    }

    private function getNamaBulanIndo($bulan){
        switch ($bulan) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
          }
    }
}
