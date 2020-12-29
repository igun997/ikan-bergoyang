@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.full.min.js"></script>
@endsection
@section('script')
    <script>
        $('.select2').select2();

        $('.gambar').on('change', function(){
            var input = this;
            var url = $(this).val();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2-bootstrap.min.css">

@endsection
@section('style')
    <style>
        .img-preview{
            width: 100px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">Detail retur</h2>

<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">#{{ $retur->idpembelian }}</h3>
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

            <!-- Supplier Info -->
            <div class="col-6 text-right">
                <p class="h3">{{ $retur->supplier->nama }}</p>
                <address>
                    {{ $retur->supplier->notelp }}<br>
                </address>
            </div>
            <!-- END Supplier Info -->
        </div>
        <!-- END Invoice Info -->

        <!-- Table -->
        <div class="table-responsive push">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 60px;"></th>
                    <th>Keterangan</th>
                    <th class="text-center" style="width: 90px;">Nomor Pembelian</th>
                    <th class="text-right" style="width: 120px;">Nomor Permintaan</th>
                    <th class="text-right" style="width: 120px;">Total Harga</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">#01</td>
                    <td>
                        <p class="font-w600 mb-5">{{ $retur->keterangan }}</p>
                        {{-- <div class="text-muted">{{ $detail->barang->deskripsi }}</div> --}}
                    </td>
                    <td class="text-center">
                        <span class="badge badge-pill badge-primary">{{ $retur->idpembelian }}</span>
                    </td>
                    <td class="text-right">{{ $retur->idpermintaan }}</td>
                    <td class="text-right">@rupiah($retur->totalharga)</td>
                </tr>
                <tr class="table-warning">
                    <td colspan="4" class="font-w700 text-uppercase text-right">Total</td>
                    <td class="font-w700 text-right">@rupiah($retur->totalharga)</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- END Table -->
    </div>
</div>
<!-- END Invoice -->
@endsection
