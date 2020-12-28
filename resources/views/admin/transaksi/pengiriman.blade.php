@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script>
        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
        $('.btnKirimBarang').on('click', function(e){
            e.preventDefault();
            $('#idtransaksi').val($(this).data('transaksiid'));
            console.log($(this).data('transaksiid'));
        });
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
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Struk</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->delivery->nama }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                    <td>{{$transaksi->transaksistatus->keterangan}}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btnKirimBarang" data-toggle="modal" data-target="#modalResi" data-transaksiid="{{$transaksi->id}}">Kirim Barang</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<h2 class="content-heading">Daftar Retur yang belum diproses pengirimannya</h2>

<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Struk</th>
                <th>Nomor Transaksi</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($returs as $retur)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $retur->id }}</td>
                    <td>#{{ $retur->transaksi_id }}</td>
                    <td>{{ $retur->created_at }}</td>
                    <td>{{$retur->transaksistatus->keterangan}}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btnKirimBarang" data-toggle="modal" data-target="#modalResiRetur" data-returid="{{$retur->id}}">Kirim Barang</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalResi">
    <form action="{{ url('admin/pengiriman') }}" method="post">
    @csrf
    <input type="hidden" name="id" id="idtransaksi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim no. resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label for="resi">No. resi</label>
                        <input type="text" id="resi" class="form-control" name="resi" placeholder="Masukkan no. resi">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim Resi</button>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalResiRetur">
    <form action="{{ url('admin/retur-pengiriman') }}" method="post">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim no. resi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @foreach($returs as $retur)
                <input type="hidden" name="id" id="idretur" value="{{ $retur->id }}">
                <input type="hidden" name="transaksi_id" value="{{ $retur->transaksi_id }}">
            @endforeach
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label for="resi">No. resi</label>
                        <input type="text" id="resi" class="form-control" name="noresi" placeholder="Masukkan no. resi">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim Resi</button>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- END Dynamic Table Full -->
@endsection