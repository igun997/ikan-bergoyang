@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="post" action="{{ url('/checkout') }}">
                                @csrf
                                <h1>Checkout</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_name">Name</label>
                                                <input type="text" id="checkout_name" class="form-control" name="nama" placeholder="Name" required="required" value="{{ @$delivery->nama ? @$delivery->nama : auth()->user()->nama }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_email">Email</label>
                                                <input type="email" id="checkout_email" class="form-control" name="email" placeholder="Email" required="required" value="{{ @$delivery->email ? @$delivery->email : auth()->user()->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Alamat Lengkap</label>
                                            <textarea name="alamat" rows="5" placeholder="Masukkan Alamat Lengkap" class="form-control">{{ $delivery['detail']['alamat'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Provinsi</label>
                                            <select name="idprovinsi" class="form-control" id="provinsi" onchange="getKota()">
                                                <option value="">-- Pilih Provinsi --</option>
                                                @foreach ($provinsi as $prov)
                                                    @if($prov->idprovinsi == $delivery['detail']['idprovinsi'])
                                                        <option value="{{$prov->idprovinsi}}" selected>{{$prov->nama}}</option>
                                                    @else
                                                        <option value="{{$prov->idprovinsi}}">{{$prov->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Kota</label>
                                            <select name="idkota" class="form-control" id="kota" onchange="getOngkir()">
                                                <option value="">-- Pilih Kota --</option>
                                                @foreach ($kota as $kot)
                                                    @if($kot->idkota == $delivery['detail']['idkota'])
                                                        <option value="{{$kot->idkota}}" selected>{{$kot->nama}}</option>
                                                    @else
                                                        <option value="{{$kot->idkota}}">{{$kot->nama}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">No. Telepon</label>
                                            <input type="text" name="no_telp" class="form-control" placeholder="Masukkan no. telepon" value="{{ $delivery['detail']['telepon'] }}">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="ongkir" id="ongkir">
                                <div class="box-footer d-flex justify-content-between"><a href="{{ url('/cart') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                                    <button type="submit" class="btn btn-primary">Bayar<i class="fa fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                    <div class="col-lg-3">
                        <div id="order-summary" class="card">
                            <div class="card-header">
                                <h3 class="mt-4 mb-4">Total Order</h3>
                            </div>
                            <div class="card-body">
                                {{-- <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p> --}}
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @foreach ($carts as $cart)
                                            <tr>
                                                <td>{{$cart->barang->nama_barang}}</td>
                                                <td>@rupiah($cart->qty * $cart->barang->harga)</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="color: black">Ongkos Kirim</td>
                                                <td style="color: black" id="ongkoskirim"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th id="total"></th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-lg-3-->
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
<script>
    $(document).ready(function(){
        getOngkir();
    });

    function getOngkir(){
        var idkota = $('#kota').val();
        let token            = "{{csrf_token()}}";
        let city_origin      = 22;
        let city_destination = idkota;
        let courier          = "jne";
        let weight           = 1000;
        let totalpayment    = {{$totalPayment}}

        $('#ongkoskirim').empty();
        $("#total").empty();
        $.ajax({
            url: "/cek-ongkir",
            data: {
                _token:              token,
                city_origin:         city_origin,
                city_destination:    city_destination,
                courier:             courier,
                weight:              weight,
            },
            dataType: "JSON",
            type: "POST",
            success: function (response) {
                if (response) {
                    $('#ongkoskirim').empty();
                    $('#ongkoskirim').append(response[0].code.toUpperCase()+' : <strong>'+response[0]['costs'][0].service+'</strong> - IDR '+response[0]['costs'][0].cost[0].value+',00 ('+response[0]['costs'][0].cost[0].etd+' hari)')
                    $('#ongkir').val(response[0]['costs'][0].cost[0].value);
                    let total = response[0]['costs'][0].cost[0].value + totalpayment;
                    $("#total").empty();
                    $("#total").append("IDR " + total + ",00");
                }
            }
        });
    }

    function getKota(){
        let prov = $('#provinsi').val();
        $.ajax({
            url: "/get-kota/" + prov,
            type: "GET",
            success: function (response) {
                if (response) {
                    $('#kota').empty();
                    $('#kota').append('<option value="">-- Pilih Kota --</option>');
                    console.log(response);
                    $.each(response, function( i, val ) {
                        $( "#kota" ).append( '<option value="'+val.idkota+'">' + val.nama + '</option>' );
                    });
                }
            }
        });
    }
</script>
@endpush
