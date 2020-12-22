@extends('customer.layout')

@section('js')

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2-bootstrap.min.css">
    <style>
        .img-preview{
            width: 100px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('style')
@endsection

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row box">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div id="productmain" class="row">
                            <div class="col-12">
                                <h3>Pengajuan Retur Order ID #{{ $transaksi->id }}</h3>
                                <hr>
                            </div>
                            <div class="col-6">
                                <p>Penerima    : {{ $transaksi->delivery->nama }}</p>
                                <p>Jenis Barang    : {{ $detail_transaksi->barang->nama_barang }}</p>
                                <p>Jumlah Barang   : {{ $detail_transaksi->qty }}</p>
                                <p>Status Barang   : {{ $transaksi->transaksistatus->keterangan }}</p>
                            </div>
                            <div class="col-12">
                                <br>
                                <div class="block-content">
                                    <form class="form-horizontal" action="{{ url('retur') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="reason">Alasan Retur Barang :</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="reason" cols="20" rows="5" placeholder="Masukkan Alasan Retur Barang">{{ @old('reason') ?? @$retur->reason }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="transaksi_id" class="transaksi_id" value="{{ $transaksi->id }}">
                                        <input type="hidden" name="status" class="status" value="{{ 8 }}">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="bukti_barang">Upload Gambar Barang</label>
                                                <div class="col-lg-10">
                                                    <input type="file" name="bukti_barang" class="bukti_barang" accept="image/jpeg;images/png">
                                                </div>
                                            </div>
                                        </div>
                                        <div v class="form-group row">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
