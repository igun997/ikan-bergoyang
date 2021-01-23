<!DOCTYPE html>
<html>
<head>
	<title>{{$details['title']}}</title>
</head>
<body>
    {{$details['body']}}
    @if(isset($details['kadaluarsabayar']))
	<div class="content py-3">
        <div class="row">
            <div class="col-md-12">
                <p style="color:gray">Segera lakukan pembayaran sebelum <b style="font-weight: bold;color:black">{{ $details['kadaluarsabayar'] }}</b>, agar pembelian anda dapat langsung diproses.</p>
                <p><strong>Account : Atas Nama Mang Ikan BUJANG</strong></p>
            </div>
            <div class="col-md-6">
                <div class="box payment-method text-center">
                    <img src="{{ asset('customer/img/bni.png') }}" alt="payment" style="max-height: 80px">
                    <p>No. Rek : 34351 22312 3431 BNI</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box payment-method text-center">
                    <img src="{{ asset('customer/img/ovo.png') }}" alt="payment" style="max-height: 80px">
                    <p>No. Rek : 34351 22312 3431 OVO</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box payment-method text-center">
                    <img src="{{ asset('customer/img/cimb.png') }}" alt="payment" style="max-height: 90px">
                    <p>No. Rek : 1273812 31638 72 CIMB</p>
                </div>
            </div>
        </div>
        <!-- /.row-->
    </div>
    @endif
</body>
</html>
