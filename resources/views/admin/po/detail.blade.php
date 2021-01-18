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

                        <div class="form-group">
                            <label for="po_date">Status</label>
                            <input type="text" class="form-control" value="{{\App\Casts\PoStatus::lang($detail->status)}}" disabled  />
                        </div>
                        <div class="form-group">
                            <label for="po_date">Catatan</label>
                            <textarea name="" id="" cols="30" rows="4" class="form-control" disabled>{{$detail->notes}}</textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="row">
                <div class="col-12">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Suplier</th>
                                        <th>Harga Barang <span class="badge badge-info">Saat PO</span></th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail->po_details as $key => $row)
                                        <tr>
                                            <td>{{($key+1)}}</td>
                                            <td>{{$row->barang->nama_barang}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->supplier->nama}}</td>
                                            <td>{{number_format($row->price)}}</td>
                                            <td>{{number_format($row->subtotal)}}</td>
                                            <td>{{\App\Casts\PoDetailStatus::lang($row->status)}}</td>
                                            <td>
                                                <a href="{{route("po.detail",[$detail->id,"detail"=>$row->id])}}" class="btn btn-info">Detail Penerimaan</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if($is_pemerimaan)
                    <div class="col-12 mt-10">
                        <div class="block">
                            <div class="block-header">
                                Data Penerimaan Barang
                            </div>
                            <div class="block-content block-content-full">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Diterima</th>
                                            <th>Pada Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($received as $_key => $_row)
                                                <tr>
                                                    <td>{{($_key+1)}}</td>
                                                    <td align="center">{{number_format($_row->qty)}}</td>
                                                    <td>{{$_row->created_at ?? " - "}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
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
            $("#po_date").datepicker({
                format:"yyyy-mm-dd"
            });
        })
    </script>
@endsection

