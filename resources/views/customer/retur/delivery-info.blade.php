@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="checkout" class="col">
                        <div class="box">
                                <h1>Delivery Information</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Kirim barang ke alamat</h4>
                                            <h3></h3>
                                        </div>
                                        <div class="col-md-3">
                                            {{-- <div class="box payment-method text-center" style="height:200px">
                                                <img src="{{ asset('customer/img/bni.png') }}" alt="payment" style="object-fit: contain">
                                                <p>No. Rek : 34351 22312 3431 (A.n. Konfeksi BUJANG)</p>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box payment-method text-center" style="height:400px">
                                                <img src="{{ asset('customer/img/alamat.png') }}" alt="payment" style="object-fit: contain">
                                                <p>Jl. Otista, Subang, Jawa Barat. Kodepos 40528</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            {{-- <div class="box payment-method text-center" style="height:200px">
                                                <img src="{{ asset('customer/img/cimb.png') }}" alt="payment" style="object-fit: contain">
                                                <p>No. Rek : 1273812 31638 72 (A.n. Konfeksi BUJANG)</p>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p style="color:gray">Anda dapat melakukan upload nomor resi pada box dibawah agar retur dapat diproses.</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- @if($retur->id) -->
                                    <form action="{{ url('delivery-info') }}" method="post">
                                        @csrf
                                        @if($retur->status == 9)
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>Input Resi Pengiriman Barang</h4>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="noresi">
                                                </div>
                                                <input type="hidden" class="form-control" name="id" value="{{ $retur->id }}">
                                                <input type="hidden" class="form-control" name="transaksi_id" value="{{ $retur->transaksi_id }}">
                                                <input type="hidden" class="form-control" name="status" value="{{ 11 }}">
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-info">Kirim Resi Pengiriman Barang</button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                    <!-- @endif -->
                                    <!-- /.row-->
                                </div>
                                <div class="box-footer d-flex justify-content-end">
                                    <a href="{{ url('/order') }}" class="btn btn-primary">My Orders<i class="fa fa-chevron-right"></i></a>
                                </div>
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
@endsection
