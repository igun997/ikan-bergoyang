<?php

namespace App\Http\Controllers\Admin;

use App\Transaksi;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Tesemeil;
use Carbon\Carbon;
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
}
