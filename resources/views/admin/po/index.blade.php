@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script>
        $("table").DataTable();
        $(document).ready(function (){
            $("table").find(".tolak").on("click",function (){
                let href = $(this).data("href");
                let id = $(this).data("id");
                let alasan = prompt("Alasan Penolakan");
                if (alasan){
                    location.href = href+"&msg="+alasan
                }
            })
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('style')
    <style>
        .table .img-preview{
            width: 70px;
            margin-right: 20px;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">{{$title}}</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ route("po.add") }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah PO</a>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode PO </td>
                        <td>Tanggal PO </td>
                        <td>Status</td>
                        <td>Catatan</td>
                        <td>Total Barang</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($po as $key => $row)
                        <tr>
                            <td>{{($key+1)}}</td>
                            <td>{{($row->no_po)}}</td>
                            <td>{{($row->po_date->format("d/m/Y"))}}</td>
                            <td>{{(\App\Casts\PoStatus::lang($row->status))}}</td>
                            <td>{{($row->notes)}}</td>
                            <td align="center">{{$row->po_details->count()}}</td>
                            <td>
                                <a href="{{route("po.detail",$row->id)}}" class="btn btn-primary btn-sm m-1">Detail</a>
                                @if($row->po_details->count() == 0)
                                    <a href="{{route("po.barang.add",$row->id)}}" class="btn btn-success btn-sm m-1">Tambah Barang</a>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->level == 1 && \App\Casts\PoStatus::MENUNGGU_VERIFIKASI_OWNER === $row->status)
                                    <a href="{{route("po.update_status",[$row->id,"status"=>\App\Casts\PoStatus::MENUNGGU_KONFIRMASI_GUDANG])}}" class="btn btn-success btn-sm m-1">Verifikasi</a>
                                    <button class="btn btn-danger btn-sm m-1 tolak" data-href="{{route("po.update_status",[$row->id,"status"=>\App\Casts\PoStatus::DITOLAK_OWNER])}}" data-id="{{$row->id}}">Tolak</button>
                                @endif
                                @if((\Illuminate\Support\Facades\Auth::user()->level == 3 && (\App\Casts\PoStatus::MENUNGGU_KONFIRMASI_GUDANG == $row->status)) || (\Illuminate\Support\Facades\Auth::user()->level == 1 && (\App\Casts\PoStatus::MENUNGGU_KONFIRMASI_GUDANG == $row->status)))
                                    <a href="{{route("po.update_status",[$row->id,"status"=>\App\Casts\PoStatus::SEDANG_DIPROSES])}}" class="btn btn-success btn-sm m-1">Proses Pengadaan</a>
                                    <a href="{{route("po.update_status",[$row->id,"status"=>\App\Casts\PoStatus::DIBATALKAN_GUDANG])}}" class="btn btn-danger btn-sm m-1">Batalkan Pengadaan</a>
                                @endif
                                @if((\Illuminate\Support\Facades\Auth::user()->level == 3 && \App\Casts\PoStatus::SEDANG_DIPROSES == $row->status) || (\Illuminate\Support\Facades\Auth::user()->level == 1 && \App\Casts\PoStatus::SEDANG_DIPROSES == $row->status))
                                    <a href="{{route("po.update_status",[$row->id,"status"=>\App\Casts\PoStatus::BARANG_SEDANG_DITERIMA])}}" class="btn btn-success btn-sm m-1">Penerimaan Barang</a>
                                @endif
                                @if((\Illuminate\Support\Facades\Auth::user()->level == 3 && \App\Casts\PoStatus::BARANG_SEDANG_DITERIMA == $row->status) || (\Illuminate\Support\Facades\Auth::user()->level == 1 && \App\Casts\PoStatus::BARANG_SEDANG_DITERIMA == $row->status))
                                    <a href="{{route("po.penerimaan",[$row->id])}}" class="btn btn-info btn-sm m-1">Penerimaan Barang</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
