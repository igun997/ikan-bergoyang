@extends('customer.layout')

@section('js')

@endsection

@section('css')

@endsection

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row box">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div id="productmain" class="row">
                            <div class="col-12">
                                <h3>Order ID #{{$transaksi->id}}</h3>
                                <hr>
                            </div>
                            <div class="col-6">
                                <p>Nama Penerima    : {{$transaksi->delivery->nama}}</p>
                                <p>Email Penerima   : {{$transaksi->delivery->email}}</p>
                                <p>Telpon Penerima  : {{$transaksi->delivery->no_telp}}</p>
                            </div>
                            <div class="col-6 text-right">
                                <h5 class="text-primary">{{$transaksi->transaksistatus->keterangan}}</h5>
                                <p>{{$transaksi->delivery->alamat}}</p>
                                <p>{{$transaksi->delivery->kota->nama}}</p>
                                <p>{{$transaksi->delivery->provinsi->nama}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                @if($transaksi->status == 1 || $transaksi->status == 7)
                                    <a href="{{url('/payment-info/')}}/{{$transaksi->id}}" class="btn btn-primary">Bayar</a>
                                @elseif($transaksi->status == 4)
                                    <p style="font-weight:bold">No. Resi : {{$transaksi->noresi}}</p>
                                    <a href="{{url('/confirm-accept/')}}/{{$transaksi->id}}" class="btn btn-primary">Konfirmasi Penerimaan Barang</a>
                                @elseif($transaksi->status == 5)
                                    <a href="{{url('/retur/')}}/{{$transaksi->id}}" class="btn btn-primary">Retur Barang</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row box">
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div id="productmain" class="row">
                           
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div> --}}
            </div>
        </div>
    </div>
@endsection
