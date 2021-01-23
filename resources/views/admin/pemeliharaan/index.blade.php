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
        @if(request()->get("action") === "add")
            <a href="{{route("piara.list",$barang->id)}}" class="btn btn-danger btn-sm mb-25"><i class="fa fa-backward"></i> Kembali</a>
        @else
        <a href="?action=add" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah Pakan</a>
        <form action="{{route("piara.aturan",$barang->id)}}" method="post">
            @csrf
            <input type="text" hidden value="{{$barang->id}}" name="barang_id">
            <div class="form-group">
                <label for="to_normal">Hari Siap Jual</label>
                <input type="number" class="form-control" name="to_normal" value="{{@$barang->barang_rules()->first()->to_normal}}" id="to_normal" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Set Hari</button>
            </div>
        </form>
        @endif
    </div>
    <div class="block-content block-content-full">
        @if(request()->get("action") === "add")
            <form action="{{route("piara.create",$barang->id)}}" method="post">
                @csrf
                <input type="text" hidden value="{{$barang->id}}" name="barang_id">
                <div class="form-group">
                    <label for="nama_pakan">Nama Pakan</label>
                    <input type="text" class="form-control" name="nama_pakan" value="" id="nama_pakan" />
                </div>
                <div class="form-group">
                    <label for="total_pakan">Total Pakan</label>
                    <input type="number" min="1" class="form-control" name="total_pakan" value="" id="total_pakan" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Pakan</td>
                        <td>Total Pakan</td>
                        <td>Tanggal Pemberian</td>
                        <td>Aksi</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($barang->barang_perawatans as $k => $r)
                        <tr>
                            <td>{{($k+1)}}</td>
                            <td>{{$r->nama_pakan}}</td>
                            <td>{{$r->total_pakan}}</td>
                            <td>{{$r->tgl_pakan->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route("piara.del",$r->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
