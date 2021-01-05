@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.full.min.js"></script>
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
<h2 class="content-heading">Laporan Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content">
        <div class="form-group row">
            <label class="col-12">Pilih Bulan</label>
            <div class="col-md-12">
                <select class="select2 form-control" id="bulan" data-placeholder="Masukan 1 atau lebih karakter untuk mencari..">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12">Pilih Tahun</label>
            <div class="col-md-12">
                <select class="select2 form-control" id="tahun" data-placeholder="Masukan 1 atau lebih karakter untuk mencari..">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-primary btnCetak">Cetak Laporan</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('body').on('click', '.btnCetak', function(e){
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();
            window.location.href = "{{url('admin/pembelian/report/monthly')}}/" + bulan + "/" + tahun;
        });

    </script>
@endsection