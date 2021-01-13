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
            const status = $('#modal-filter .status').val()||null;
            const start = $('#modal-filter .start').val()||null;
            const end = $('#modal-filter .end').val()||null;
            let url = '{{url('admin/report/retur-penjualan')}}';
            let params = '';

            if(status) params += '?status='+status;
            if(start) {
                if(params != '') params += '&start='+start;
                else params +='?start='+start;
            }
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
<h2 class="content-heading">{{$title}}</h2>

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
                @foreach($returs as $retur)
                    <tr>
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
                            <a href="#" onclick="popupFunction({{ $retur->transaksi_id }})" class="btn btn-block btn-primary"><i class="fa fa-user"></i> Detail User</a>
                            <a href="{{ url('admin/detail-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-primary"><i class="fa fa-eye"></i> Detail Retur</a>
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
                <div class="row">
                    <div class="col-12">
                        <select type="text" class="form-control status">
                            <option value="">Semua</option>
                            <option value="9">Dikonfirmasi</option>
                            <option value="10">Ditolak</option>
                            <option value="12">Proses Pengembalian</option>
                        </select>
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
