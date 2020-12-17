<?php

namespace App\Http\Controllers\Customer;

use App\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class HomeController extends Controller
{
    public function index(){
        $data['produks'] = new Barang();

        $data['produks'] = $data['produks']->paginate(10);
        return view('customer.home', $data);
    }
}
