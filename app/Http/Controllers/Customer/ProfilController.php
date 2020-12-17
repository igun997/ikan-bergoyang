<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kota;
use App\Provinsi;
use App\User;
use App\UsersDetail;

class ProfilController extends Controller
{
    public function index(){
        $iduser = auth()->user()->id;
        $data = User::with('detail.provinsi', 'detail.kota')->where('id', $iduser)->first();

        return view('customer.profil.index', $data);
    }

    public function edit(){
        $iduser = auth()->user()->id;
        $data['profil'] = User::with('detail.provinsi', 'detail.kota')->where('id', $iduser)->first();
        $data['provinsi']   = Provinsi::all();
        $data['kota']       = Kota::all();

        return view('customer.profil.edit', $data);
    }

    public function update(Request $request){
        $iduser = auth()->user()->id;
        $user = User::where('id', $iduser)->update([
            'nama' => $request->nama
        ]);

        UsersDetail::where('iduser', $iduser)->update([
            'alamat'        => $request->alamat,
            'idprovinsi'    => $request->provinsi,
            'idkota'        => $request->kota,
            'telepon'       => $request->telp,
        ]);

        return redirect()->to('/profil')->with('message', 'Profil berhasil diperbarui');
    }
}
