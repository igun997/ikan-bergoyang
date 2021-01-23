<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\BarangPerawatan;
use App\Models\BarangRule;
use App\Traits\ViewTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemeliharaanController extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "admin.pemeliharaan";
    }

    public function index($id)
    {
        $barang = Barang::findOrFail($id);
        $title = "Data Pemeliharaan";
        return $this->loadView("index",compact("barang","title"));
    }

    public function add_action(Request $req)
    {
        $data = $req->all();
        $data["tgl_pakan"] = Carbon::now();
        $create = BarangPerawatan::create($data);
        if ($create){
            return redirect()->route("piara.list",$create->barang_id);
        }
        return back();
    }

    public function del($id)
    {
        BarangPerawatan::findOrFail($id)->delete();
        return back();
    }

    public function set_aturan(Request $req)
    {
        $data = $req->all();
        unset($data["_token"]);
        $update = BarangRule::where(["barang_id"=>$req->barang_id]);
        if ($update->count() > 0){
            $create = $update->update(["to_normal"=>$req->to_normal]);
        }else{
            $create = BarangRule::firstOrCreate($data);
        }
        if ($create){
            return back();
        }
        return back();
    }
}
