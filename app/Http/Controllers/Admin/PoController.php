<?php

namespace App\Http\Controllers\Admin;

use App\Casts\PoStatus;
use App\Models\Po;
use App\Traits\ViewTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoController extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "admin.po";
    }

    public function index()
    {
        $title = "Data PO";
        $po = Po::all();
        return $this->loadView("index",compact("title","po"));
    }

    public function add()
    {
        $title = "Tambah PO";
        return $this->loadView("form",compact("title"));
    }

    public function add_action(Request $req)
    {
        $req->validate([
           "no_po"=>"required|unique:po,no_po",
           "po_date"=>"required"
        ]);
        $data = $req->all();
        $data["status"] = PoStatus::MENUNGGU_VERIFIKASI_OWNER;
        $create = Po::create($data);
        if ($create){
            return redirect()->route("po.barang.add",$create->id);
        }
        return back()->withErrors(["msg"=>"Gagal Membuat PO"]);
    }

    public function update_status(Request $req,$id)
    {
        $req->validate([
            "status"=>"required",
            "msg"=>"min:2"
        ]);

        $po = Po::findOrFail($id);
        $po->status = $req->status;
        if ($req->has("msg")){
            $po->notes = $req->msg;
        }
        if ($po->save()){
            return back()->with(["msg"=>"Data Telah Di Ubah"]);
        }
        return  back()->withErrors(["msg"=>"Data Gagal Di Ubah"]);
    }

    public function detail($id)
    {
        $detail = Po::findOrFail($id);
        $title = "Detail PO #".$detail->no_po;
        return $this->loadView("detail",compact("title","detail"));
    }
}
