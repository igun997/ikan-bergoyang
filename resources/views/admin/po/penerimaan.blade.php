@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" />
@endsection

@section('style')

@endsection

@section('content')
    <h2 class="content-heading">{{$title}}</h2>

    <div class="row">
        <div class="col-12 col-md-4">
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
        <div class="col-12 col-md-8">
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Sisa Barang</th>
                                    <th>Total Diterima</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form action="{{route("po.penerimaan.add.action",$detail->id)}}" method="post" >
                                @csrf
                               @foreach($detail->po_details as $key => $row)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$row->barang->nama_barang}}</td>
                                    @if($row->qty - ($row->po_receiveds->sum("qty")) == 0)
                                        <td align="center"> - </td>
                                    @else
                                        <td align="center">{{$row->qty - ($row->po_receiveds->sum("qty"))}}</td>
                                    @endif
                                    <td>
                                        @if(($row->qty - ($row->po_receiveds->sum("qty")) > 0))
                                        <input type="text" hidden name="po_detail_id[]" value="{{$row->id}}">
                                        <input type="number" required min="1" max="{{$row->qty - ($row->po_receiveds->sum("qty"))}}" name="penerimaan[]" class="form-control">
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                                <tr>
                                    <td colspan="4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </td>
                                </tr>
                            </form>
                            </tbody>
                        </table>
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
            $("#po_date").datepicker({
                format:"yyyy-mm-dd"
            });
        })
    </script>
@endsection

