@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        })

        function generateLaporan(){
            const start = $('#modal-filter .start').val()||null;
            const end = $('#modal-filter .end').val()||null;
            let url = '{{url('admin/report/retur-pembelian')}}';
            let params = '';

            if(start) params += '?start='+start;
            if(end) {
                if(params != '') params += '&end='+end;
                else params +='?end='+end;
            }
            location.href = url+params;
        }
        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
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
<h2 class="content-heading">Retur Dalam Proses</h2>

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
                <th>Tanggal Dibuat</th>
                <th>Total Harga</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($returs as $retur)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $retur->idpembelian }}</td>
                    <td>{{ $retur->supplier->nama }}</td>
                    <td>{{ $retur->created_at }}</td>
                    <td>{{ $retur->totalharga }}</td>
                    <td>{{ $retur->keterangan }}</td>
                    <td>{{ $retur->status }}</td>
                    <td class="text-center">
                        @if(auth()->user()->level == 1)
                            <a href="{{ url('admin/confirm-retur-pembelian/'.$retur->idpembelian) }}" class="btn btn-primary">Acc Retur</a>
                            <a href="{{ url('admin/reject-retur-pembelian/'.$retur->idpembelian) }}" class="btn btn-danger">Tolak Retur</a>
                        @else
                            No action available
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->

<h2 class="content-heading">Retur Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">        
        <div class="btn btn-info btn-sm mb-25" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-file"></i> Buat Laporan</div>
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
                    <td>{{ $transaksi->keterangan }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td class="text-center">
                        <a href="{{ url('/admin/retur-pembelian/'.$transaksi->idpembelian) }}" class="btn btn-primary"><i class="fa fa-eye"></i>Detail Retur</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->

<div class="modal" tabindex="-1" role="dialog" id="modal-filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Filter Laporan</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <input type="text" class="form-control start datepicker" placeholder="Tanggal Mulai">
                    </div>                    
                    <div class="col-6">
                        <input type="text" class="form-control end datepicker" placeholder="Tanggal Selesai">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="generateLaporan()">Download Laporan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
