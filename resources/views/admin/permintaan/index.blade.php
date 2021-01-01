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
<h2 class="content-heading">Permintaan Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/permintaan/create') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah Permintaan</a>
    </div>
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Permintaan</th>
                <th>Pembuat</th>
                <th>Tanggal Dibuat</th>
                <th>Total Barang</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $transaksi->id }}</td>
                    <td>
                        <a href="{{ url('admin/user/'.$transaksi->user_id.'/edit') }}">{{ $transaksi->user->nama }}</a>
                    </td>
                    <td>{{ $transaksi->created_at }}</td>
                    <td>{{ count($transaksi->detail) }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/permintaan/'.$transaksi->id) }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="#" method="post" id="formDelete" class="d-none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
