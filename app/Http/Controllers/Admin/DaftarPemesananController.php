<?php

namespace App\Http\Controllers\Admin;
use App\Pemesanan;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DaftarPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['pemesanan'] = Pemesanan::all();
        return view('admin.pemesanan.index', $data);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pemesanan'] = Pemesanan::find($id);

        // dd($data);
        
        return view('admin.pemesanan.show', $data);
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
        $input = $request->all();

        $validate = Validator::make($input, [
            'status' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $pemesanan = Pemesanan::find($id);

            $query = $pemesanan->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Status pemesanan berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Status pemesanan gagal diubah.')->withInput($input);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $query = $pemesanan->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data Pemesanan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data Pemesanan gagal dihapus.');
        }
    }
}
