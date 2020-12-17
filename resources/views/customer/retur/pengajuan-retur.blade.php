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
                                <h3>Pengajuan Retur Order ID #{{$transaksi->id}}</h3>
                                <hr>
                            </div>
                            <div class="col-6">
                                <p>Jenis Barang    : {{$transaksi->delivery->nama}}</p>
                                <p>Jumlah Barang   : {{$transaksi->delivery->email}}</p>
                                <p>Status Barang   : {{$transaksi->transaksistatus->keterangan}}</p>
                            </div>
                            <div class="col-12">
                                <br>
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="reason">Alasan Retur Barang :</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="reason" cols="20" rows="5" placeholder="Masukkan Alasan Retur Barang">{{ @old('reason') ?? @$retur->reason }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="bukti_barang">Upload Gambar Barang</label>
                                            <div class="col-lg-10">
                                                {{-- benerin src gambarnya --}}
                                                <img class="img-preview" src="{{ @$retur->bukti_barang ? asset('uploads/bukti-retur/'.$retur->bukti_barang) : '' }}" alt="" onerror="this.src='{{ asset('admin-asset/assets/img/avatars/avatar0.jpg') }}'">
                                                <input type="file" name="bukti_barang" class="bukti_barang" accept="image/jpeg;images/png">
                                            </div>
                                        </div>
                                    </div>
                                    <div v class="form-group row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
