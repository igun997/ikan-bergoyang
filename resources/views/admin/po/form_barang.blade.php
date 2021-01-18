@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" />
@endsection

@section('style')

@endsection

@section('content')
    <h2 class="content-heading">{{$title}}</h2>

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="block">
                <div class="block-content block-content-full">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="no_po">Kode PO</label>
                            <input type="text" class="form-control" name="no_po" value="{{$detail->no_po}}"  disabled />
                        </div>
                        <div class="form-group">
                            <label for="po_date">Tanggal PO</label>
                            <input type="text" class="form-control" value="{{$detail->po_date->format("d/m/Y")}}" disabled  />
                        </div>
                        @if($detail->po_details->count() > 0)
                        <div class="form-group">
                            <label for="po_date">Status</label>
                            <input type="text" class="form-control" value="{{\App\Casts\PoStatus::lang($detail->status)}}" disabled  />
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="po_date">Catatan</label>
                            <textarea name="" id="" cols="30" rows="4" class="form-control" disabled>{{$detail->notes}}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="6" align="center" class="text-center">
                                    <img src="" id="gambar_barang" class="img-fluid img-thumbnail img-thumb" style="max-height: 170px" alt="">
                                </th>
                            </tr>
                            <tr>
                                <form action="{{route("po.barang.add.action",$detail->id)}}" method="post">
                                    @csrf
                                    <th colspan="2">
                                        <div class="form-group">
                                            <label >Nama Barang</label>
                                            <select name="id_barang" id="id_barang" class="form-control select2">
                                                @foreach($barang as $k => $r)
                                                    <option data-img="{{url("uploads/barang/".$r->gambar)}}" value="{{$r->id}}">{{$r->nama_barang}} - ({{$r->stok}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </th>
                                    <th colspan="2">
                                        <label >Suplier</label>
                                        <select name="suplier_id" id="suplier_id" class="form-control select2">
                                            @foreach($suplier as $k => $r)
                                                <option  value="{{$r->idsupplier}}">{{$r->nama}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th >
                                        <div class="form-group">
                                            <label >Jumlah Beli</label>
                                            <input type="number" name="qty" id="qty" min="1" class="form-control">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <button class="btn-primary btn btn-sm btn-block" type="submit">Tambah</button>
                                        </div>
                                    </th>
                                </form>

                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Nama Suplier</th>
                                <th>Jumlah Beli</th>
                                <th>Harga Beli</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detail->po_details as $key => $row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->barang->nama_barang}}</td>
                                    <td>{{$row->supplier->nama}}</td>
                                    <td>{{$row->qty}}</td>
                                    <td>{{number_format($row->price)}}</td>
                                    <td>
                                        <a href="{{route("po.barang.delete",[$detail->id,$row->id])}}" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route("po.list")}}" class="btn btn-primary btn-lg mt-10">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $("#id_barang").val(0)
            $("#id_barang").trigger("change");
            $("#id_barang").on("change",function (){
                const selected = $(this).find(":selected");
                let img = selected.data("img");
                $("#gambar_barang").attr("src",img);
            })
        })
    </script>
@endsection

