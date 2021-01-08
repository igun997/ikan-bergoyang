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
<h2 class="content-heading text-center">Laporan Retur Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Tanggal Dibuat</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Nomor Resi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($returs as $key=>$retur)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>#{{ $retur->transaksi_id }}</td>
                        <td>{{ $retur->created_at }}</td>
                        <td>{{ $retur->reason }}</td>
                        <td>{{ $retur->transaksistatus->keterangan }}</td>
                        @if($retur->noresi != null)
                            <td>{{ $retur->noresi }}</td>
                        @else
                            <td>No data available</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
