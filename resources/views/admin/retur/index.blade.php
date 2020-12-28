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
                <th>Nomor Transaksi</th>
                <th>Tanggal Dibuat</th>
                <th>Alasan</th>
                <th>Bukti Barang</th>
                <th>Status</th>
                <th>Nomor Resi</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($returs as $retur)
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $retur->transaksi_id }}</td>
                    <td>{{ $retur->created_at }}</td>
                    <td>{{ $retur->reason }}</td>
                    <td>
                        <a target="_blank" href="{{ url('uploads/bukti-barang/') }}/{{$retur->bukti_barang}}">Lihat Bukti Barang</a>
                    </td>
                    <td>{{ $retur->transaksistatus->keterangan }}</td>
                    @if($retur->noresi != null)
                    <td>{{ $retur->noresi }}</td>
                    @else
                    <td>No data available</td>
                    @endif
                    <td class="text-center">
                        @if($retur->status == 8)
                        <a href="{{ url('admin/confirm-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-primary">Terima</a>
                        <a href="{{ url('admin/reject-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-danger">Tolak</a>
                        @elseif($retur->status == 11)
                        <a href="{{ url('admin/proses-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-primary">Proses Retur</a>
                        @else
                        No action available
                        @endif
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
