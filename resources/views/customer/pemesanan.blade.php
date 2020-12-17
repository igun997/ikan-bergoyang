@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="checkout" class="col-lg-9">
                        <div class="box">
                            <form method="post" action="{{ url('/pemesanan') }}" enctype="multipart/form-data">
                                @csrf
                                <h1>Pemesanan</h1>
                                @include('message')
                                <div class="content py-3">
                                    <div class="col-6">
                                                <input type="file" class="form-control" name="gambar">
                                            </div>
                                        </div>
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
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">No.Hp</label>
                                                <input type="text" id="checkout_address" class="form-control" name="no_hp" placeholder="No.Hp" required="required" value="{{ @$delivery->no_hp }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Warna</label>
                                                <input type="text" id="checkout_address" class="form-control" name="warna" placeholder="Masukkan Warna" required="required" value="{{ @$delivery->warna }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Bahan</label>
                                                <input type="text" id="checkout_address" class="form-control" name="bahan" placeholder="Masukkan Bahan" required="required" value="{{ @$delivery->bahan }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Ukuran</label>
                                                <input type="text" id="checkout_address" class="form-control" name="ukuran" placeholder="Masukkan Ukuran" required="required" value="{{ @$delivery->ukuran }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Jumlah</label>
                                                <input type="text" id="checkout_address" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required="required" value="{{ @$delivery->jumlah }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="checkout_address">Alamat</label>
                                                <input type="text" id="checkout_address" class="form-control" name="alamat" placeholder="Masukkan Jumlah" required="required" value="{{ @$delivery->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                <div class="box-footer d-flex justify-content-between"><a href="{{ url('/cart') }}" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Back to Basket</a>
                                    <button type="submit" class="btn btn-primary">Continue Request<i class="fa fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-->
                    </div>
                    <!-- /.col-lg-9-->
                    <div class="col-lg-3">
                        <div id="order-summary" class="card">
                            <div class="card-header">
                                <h3 class="mt-4 mb-4">Pesanan Anda</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                                <div class="table-responsive">
                                    <table class="table">
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
