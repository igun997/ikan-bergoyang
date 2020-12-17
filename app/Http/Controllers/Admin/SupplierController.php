<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $data['supplier'] = Supplier::where('isdelete', 0)->get();
        return view('admin.supplier.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah';
        $data['url'] = url('/admin/supplier');
        return view('admin.supplier.form', $data);
    }

    public function show($id){
        return abort(404);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {

            $query = Supplier::create($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data Supplier berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Data Supplier gagal ditambahkan.')->withInput($input);
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit';
        $data['url'] = url('/admin/supplier/'.$id);
        $data['supplier'] = Supplier::find($id);
        return view('admin.supplier.form', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors())->withInput($input);
        }else {
            $barang = Supplier::find($id);

            $query = $barang->update($input);
            if ($query) {
                return redirect()->back()->with('info', 'Data Supplier berhasil diubah.');
            } else {
                return redirect()->back()->with('error', 'Data Supplier gagal diubah.')->withInput($input);
            }
        }
    }

    public function destroy($id)
    {
        $barang = Supplier::findOrFail($id);

        $query = $barang->update(['isdelete' => 1]);
        if ($query) {
            return redirect()->back()->with('info', 'Data Supplier berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data Supplier gagal dihapus.');
        }
    }
}
