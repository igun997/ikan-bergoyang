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
<h2 class="content-heading">{{ $title }} Supplier</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/supplier') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-list"></i> Daftar Supplier</a>
    </div>
    <div class="block-content">
        @include('message')
        <form class="form-horizontal" action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($title != 'Tambah')
                @method('put')
            @endif
            <div class="form-group row">
                <label class="col-12">Nama</label>
                <div class="col-md-12">
                    <input type="text" name="nama" value="{{ @old('nama') ?? @$supplier->nama }}" class="form-control" placeholder="Masukan nama supplier">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">No Telpon</label>
                <div class="col-md-12">
                    <input type="text" name="notelp" value="{{ @old('notelp') ?? @$supplier->notelp }}" class="form-control" placeholder="Masukan no telpon supplier    ">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
