@extends('admin.laporan-layout')

@section('js')
    {{-- <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script> --}}
@endsection
@section('script')
    {{-- <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script> --}}
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css"> --}}
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
<h2 class="content-heading text-center">Laporan Retur Penjualan</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Transaksi</th>
                <th>Supplier</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Tanggal Retur</th>
            </tr>
            </thead>
            <tbody>
                @foreach($returs as $key => $retur)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>#{{ $retur->idpembelian }}</td>
                        <td>{{ $retur->supplier->nama }}</td>
                        <td>{{ $retur->totalharga }}</td>
                        <td>{{ $retur->keterangan }}</td>
                        <td>{{ $retur->status }}</td>
                        <td>{{ $retur->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
