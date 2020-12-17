<?php

namespace App\Http\Controllers\Customer;

use App\Barang;
use App\Cart;
use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::where('user_id', auth()->user()->id)->get();
        if(count($data['carts']) > 0)
            $data['enabled'] = true;
        else
            $data['enabled'] = false;
        foreach($data['carts'] as $cart){
            if($cart->qty > $cart->barang->stok)
                $data['enabled'] = false;
        }
        return view('customer.cart', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah';
        $data['url'] = url('/admin/cart');
        $data['kategoris'] = Kategori::all();
        return view('customer.cart', $data);
    }

    public function show($id){
        return abort(404);
    }

    public function store(Request $request)
    {
        return abort(404);
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'qty' => 'required',
        ]);

        $stok = Barang::where('id', $id)->first()->stok;

        if($input['qty'] <= $stok){
            if($validate->fails()){
                return redirect()->back()->withErrors($validate->errors())->withInput($input);
            }else {
                $input['barang_id'] = $id;
                $input['user_id'] = auth()->user()->id;
    
                $query = Cart::updateOrCreate([
                    'barang_id' => $id,
                    'user_id' => auth()->user()->id
                ], $input);
    
                if($query){
                    return redirect()->back()->with('info', 'Data barang berhasil ditambahkan kedalam cart');
                }else{
                    return redirect()->back()->with('error', 'Data barang gagal ditambahkan kedalam cart');
                }
            }
        }else{
            return redirect()->back()->with('error', 'Stok barang tidak tersedia');
        }
    }

    public function checkout(Request $request)
    {
        $input = $request->all();

        foreach($input['qty'] as $idCart => $qty){
            $cart = Cart::find($idCart);
            $cart->update(['qty' => $qty]);
        }

        return redirect('/checkout');
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('barang_id', $id);
        $query = $cart->delete();
        if ($query) {
            return redirect()->back()->with('info', 'Data cart berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data cart gagal dihapus.');
        }
    }
}
