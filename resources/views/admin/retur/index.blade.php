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
                <th>Transaksi ID</th>
                <th>Tanggal Dibuat</th>
                <th>Alasan</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($returs as $retur)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $retur->transaksi_id }}</td>
                    <td>{{ $retur->created_at }}</td>
                    <td><?= $retur->reason ?></td>
                    <td class="text-center">
                        <a href="{{ url('/admin/retur/'.$retur->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        {{-- <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/retur/'.$retur->id) }}"><i class="fa fa-trash"></i></a> --}}
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