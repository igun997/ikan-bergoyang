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
<h2 class="content-heading">Transaksi Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/pembelian/create') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah Pesanan Pembelian</a>
    </div>
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Transaksi</th>
                <th>Supplier</th>
                <th>Tanggal Dibuat</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $transaksi->idpembelian }}</td>
                    <td>{{ $transaksi->supplier->nama }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                    <td>{{ $transaksi->totalharga }}</td>
                    <td>{{$transaksi->keterangan}}</td>
                    <td>{{$transaksi->status}}</td>
                    <td class="text-center">
                        <a href="{{ url('/admin/pembelian/'.$transaksi->idpembelian) }}" class="btn btn-primary"><i class="fa fa-eye"></i>Detail Pembelian</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
