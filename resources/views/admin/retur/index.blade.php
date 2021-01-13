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
            $(document).on('click','.detail-user',function(){
                var data = $(this).data('user');
                console.log(data);
                $("#IsiModal").html('<table width="100%" style="font-size:14px"><tr><td>Nama</td><td>:</td><td>'+data.nama+'</td></tr><tr><td>Alamat</td><td>:</td><td>'+data.alamat+'</td></tr><tr><td>Nomor Telepon</td><td>:</td><td>'+data.no_telp+'</td></tr><tr><td>E-mail</td><td>:</td><td>'+data.email+'</td></tr></table>');
                $('#ModalDetail').modal('show');
            });
            $(document).on('click','.detail-retur',function(){
                $.ajax({
                    type: "get",
                    url: "{{ url('admin/get-retur') }}/"+$(this).data('id'),
                    dataType: "json",
                    success: function (retur) {
                        console.log(retur);
                        //set data ke modal
                        $('#retur_idretur').html(retur.id);
                        $('#retur_idtransaksi').html(retur.transaksi.id);
                        // $('#namaid').html(retur.delivery.nama);
                        var detail_barang = "";
                        $.each(retur.transaksi.detail, function (idx, detail) { 
                             detail_barang += "<tr>";
                             detail_barang += "<td>"+(idx+1)+"</td>";
                             detail_barang += "<td>"+detail.barang.nama_barang+"</td>";
                             detail_barang += "<td>"+retur.reason+"</td>";
                             detail_barang += "<td>"+detail.qty+"</td>";
                             detail_barang += "<td>"+detail.barang.harga+"</td>";
                             detail_barang += "<td>"+detail.qty*detail.barang.harga+"</td>";
                             detail_barang += "</tr>";
                             detail_barang += "<tr>";
                             detail_barang += "<td>Total</td>";
                             detail_barang += "<td></td>";
                             detail_barang += "<td></td>";
                             detail_barang += "<td></td>";
                             detail_barang += "<td></td>";
                             detail_barang += "<td>"+retur.transaksi.total_harga+"</td>";
                             detail_barang += "</tr>";
                        });
                        $('#tblDetailRetur tbody').html(detail_barang);
                        $('#Modalretur').modal('show');
                    }
                });
            });
        });

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
                            <button data-user="{{ json_encode($retur->delivery) }}" class="btn btn-block btn-primary detail-user"><i class="fa fa-user"></i> Detail User</button>
                            <button class="btn btn-block btn-primary detail-retur" data-id="{{ $retur->id }}"><i class="fa fa-eye"></i> Detail Retur</button>
                            @if($retur->status == 8)
                            <a href="{{ url('admin/confirm-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-primary">Terima</a>
                            <a href="{{ url('admin/reject-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-danger">Tolak</a>
                            @elseif($retur->status == 11)
                            <a href="{{ url('admin/proses-retur/'.$retur->id.'/'.$retur->transaksi_id) }}" class="btn btn-block btn-primary">Proses Retur</a>
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

<!-- Modal -->
<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><span class="fa fa-user"></span>&nbsp;Detail User</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body" id="IsiModal">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>  Tutup</button>
          </div>
      </div>
    </div>
  </div>
  <!-- akhir kode modal dialog -->

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
                <div class="retur">
                    <div class="col-12">
                        <p>Filter Laporan</p>
                    </div>
                </div>                
                <div class="retur">
                    <div class="col-12">
                        <select type="text" class="form-control status">
                            <option value="">Semua</option>
                            <option value="9">Dikonfirmasi</option>
                            <option value="10">Ditolak</option>
                            <option value="12">Proses Pengembalian</option>
                        </select>
                    </div>
                </div>
                <div class="retur mt-3">
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
<!-- Modal -->
<div class="modal fade" id="Modalretur" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Retur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Retur Nomor # <span id="retur_idretur"></span>
                        <br>
                        ID Transaksi # <span id="retur_idtransaksi"></span>
                        </h3>
                        <div class="block-options">
                            <!-- Print Page functionality is initialized in Codebase() -> uiHelperPrint() -->
                            <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                                <i class="si si-printer"></i> Print Invoice
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Invoice Info -->
                        <div class="row my-20">
                            <!-- Company Info -->
                            <div class="col-6">
                                <p class="h3">KONFEKSI J&S</p>
                                <address>
                                    Jalan hajianwar No.22b RT 01 RW 08 kel. Cibuntu<br>
                                    Kec. Bandung<br>
                                    40212<br>
                                    <a href="mailto:jands@gmail.com">jands@gmail.com</a>
                                </address>
                            </div>
                            <!-- END Company Info -->
                
                            <!-- Client Info -->
                            <div class="col-6 text-right">
                                <p class="h3"></p>
                                <address>
                                </address>
                            </div>
                            <!-- END Client Info -->
                        </div>
                        <!-- END Invoice Info -->
                
                        <!-- Table -->
                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover" id="tblDetailRetur">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 60px;"></th>
                                    <th>Product</th>
                                    <th class="text-left" style="width: 250px;">Alasan Retur</th>
                                    <th class="text-center" style="width: 90px;">Qty</th>
                                    <th class="text-right" style="width: 120px;">Unit</th>
                                    <th class="text-right" style="width: 120px;">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- END Table -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
