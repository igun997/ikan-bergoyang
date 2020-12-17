@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="basket" class="col-lg-12">
                        <div class="box">
                            <h3>Profil Anda</h3>
                            @include('message')
                            <div class="block block-themed block-rounded block-shadow">
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ $nama }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Alamat Lengkap</label>
                                            <textarea name="alamat" rows="5" placeholder="Masukkan Alamat Lengkap" class="form-control" readonly>{{ $detail['alamat'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Provinsi</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ $detail['provinsi']['nama'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Kota</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ $detail['kota']['nama'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">No. Telepon</label>
                                            <input type="text" name="telp" class="form-control" placeholder="Masukkan no. telepon" value="{{ $detail['telepon'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="login-username">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="offset-6 col-sm-6 text-sm-right push">
                                            <a href="{{url('/profil/edit')}}" class="btn btn-primary" >
                                                <i class="si si-login mr-10"></i> Edit Profil
                                            </a>
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
