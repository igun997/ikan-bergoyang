<?php

namespace App\Http\Controllers\Admin;

use App\Casts\PoDetailStatus;
use App\Casts\PoStatus;
use App\Models\Barang;
use App\Models\Po;
use App\Models\PoDetail;
use App\Models\PoReceived;
use App\Models\Supplier;
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
            if ($req->status == PoStatus::BARANG_SEDANG_DITERIMA){
                return redirect()->route("po.penerimaan",$po->id);
            }
            return back()->with(["msg"=>"Data Telah Di Ubah"]);
        }
        return  back()->withErrors(["msg"=>"Data Gagal Di Ubah"]);
    }

    public function detail(Request  $req,$id)
    {
        $detail = Po::findOrFail($id);
        $title = "Detail PO #".$detail->no_po;
        $is_pemerimaan = false;
        $received = null;
        if ($req->has("detail")){
            $id_detail = $req->detail;
            $received = PoReceived::where(["po_detail_id"=>$id_detail])->get();
            $is_pemerimaan = true;
        }
        return $this->loadView("detail",compact("title","detail","received","is_pemerimaan"));
    }

    public function penerimaan(Request $req,$id)
    {
        $detail = Po::findOrFail($id);
        if ($detail->status != PoStatus::BARANG_SEDANG_DITERIMA){
            return back()->withErrors(["msg"=>"Error Status Pengadaan Salah !"]);
        }
        $title = "Penerimaan Barang ".$detail->no_po;
        return  $this->loadView("penerimaan",compact("title","detail"));
    }

    public function penerimaan_add_action(Request $req,$id)
    {
        $req->validate([
            "penerimaan.*"=>"required|numeric",
            "po_detail_id.*"=>"required|numeric",
        ]);

        $batch = [];
        $is_completed = [];
        foreach ($req->penerimaan as $index => $item) {
            $detail = PoDetail::find($req->po_detail_id[$index]);
            $sisa = $detail->qty - $detail->po_receiveds->sum("qty");
            if (($sisa - $item) > 0){
                $batch[] = [
                    "po_detail_id"=>$req->po_detail_id[$index],
                    "qty"=>$item,
                    "created_at"=>date("Y-m-d")
                ];
                $detail->barang->update(["stok"=>($detail->barang->stok + $item)]);
                $is_completed[] = -1;
                $detail->status = PoDetailStatus::BARANG_SEDANG_TERIMA;
            }else{
                $is_completed[] = 1;
                $batch[] = [
                    "po_detail_id"=>$req->po_detail_id[$index],
                    "qty"=>$item,
                    "created_at"=>date("Y-m-d")
                ];
                $detail->barang->update(["stok"=>($detail->barang->stok + $item)]);

                $detail->status = PoDetailStatus::BARANG_SELESAI_DI_TERIMA;
            }
            $detail->save();
        }
        $other_redirect = false;
        if (array_sum(array_unique($is_completed)) === 1){
            $po = Po::find($id);
            $po->status = PoStatus::BARANG_SELESAI_DITERIMA;
            $po->save();
            $other_redirect = true;
        }

        $create = PoReceived::insert($batch);
        if ($create){
            if ($other_redirect){
                return redirect()->route("po.list");
            }
            return back()->with(["msg"=>"Data Telah Di Update"]);
        }
        return back()->withErrors(["msg"=>"Data Gagal Di Ubah"]);

    }

    public function barang_add($id)
    {
        $detail = Po::findOrFail($id);
        $barang = Barang::orderBy("stok","asc")->get();
        $suplier = Supplier::all();
        $title = "Tambah Barang Di PO";
        return $this->loadView("form_barang",compact("title","barang","detail","suplier"));
    }

    public function barang_add_action(Request $req,$id)
    {
        $req->validate([
            "qty"=>"required",
            "suplier_id"=>"required",
            "id_barang"=>"required",
        ]);

        $object = new PoDetail();
        $object->barang_id = $req->id_barang;
        $object->price = $object->barang->harga;
        $object->po_id = $id;
        $object->suplier_id = $req->suplier_id;
        $object->qty = $req->qty;
        $object->subtotal = $object->barang->harga * $object->qty;
        $object->status = PoDetailStatus::MENUNGGU_PROSES_SUPLIER;

        $create = PoDetail::create($object->toArray());
        if ($create){
            return back()->with(["msg"=>"OK"]);
        }
        return back()->withErrors(["msg"=>"Barang gagal di tambahkan"]);
    }

    public function barang_delete($id,$id_detail)
    {
        PoDetail::find($id_detail)->delete();
        return back()->with(["msg"=>"OK"]);
    }
}
