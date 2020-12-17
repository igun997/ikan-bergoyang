@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="checkout" class="col">
                        <div class="box">
                                <h1>Payment Information</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h4>Pembayaran sebesar</h4>
                                            <h3>@rupiah($transaksi->total_harga)</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box payment-method text-center" style="height:200px">
                                                <img src="{{ asset('customer/img/bni.png') }}" alt="payment" style="object-fit: contain">
                                                <p>No. Rek : 34351 22312 3431 (A.n. Konfeksi J&S)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box payment-method text-center" style="height:200px">
                                                <img src="{{ asset('customer/img/ovo.png') }}" alt="payment" style="object-fit: contain">
                                                <p>No. Rek : 34351 22312 3431 (A.n. Konfeksi J&S)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="box payment-method text-center" style="height:200px">
                                                <img src="{{ asset('customer/img/cimb.png') }}" alt="payment" style="object-fit: contain">
                                                <p>No. Rek : 1273812 31638 72 (A.n. Konfeksi J&S)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p style="color:gray">Segera lakukan pembayaran sebelum <b style="font-weight: bold;color:black">{{ $transaksi->kadaluarsabayar }}</b>, agar pembelian anda dapat langsung diproses.</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- @if($transaksi->id) -->
                                    <form action="{{url('/confirm-payment/') . '/' . $transaksi->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if($transaksi->buktipembayaran)
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3>Bukti Pembayaran</h3>
                                                </div>
                                                <div class="col-12">
                                                    <h5>Bukti Pembayaran yang sudah dikirimkan</h5>
                                                    <img style="width:300px;height:300px" src="{{url('uploads/barang')}}/{{$transaksi->buktipembayaran}}">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <h4>Kirim Bukti Pembayaran Ulang</h4>
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="buktipembayaran">
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-info">Kirim Bukti Pembayaran</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4>Kirim Bukti Pembayaran</h4>
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="buktipembayaran">
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-info">Kirim Bukti Pembayaran</button>
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
