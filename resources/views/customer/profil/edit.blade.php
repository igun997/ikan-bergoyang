@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="basket" class="col-lg-12">
                        <div class="box">
                            @include('message')
                            <h3>Edit Profil</h3>
                            <form action="{{ url('/profil/update') }}" method="post">
                                @csrf
                                <div class="block block-themed block-rounded block-shadow">
                                    <div class="block-content">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-username">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="{{ $profil['nama'] }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-username">Alamat Lengkap</label>
                                                <textarea name="alamat" rows="5" placeholder="Masukkan Alamat Lengkap" class="form-control">{{ $profil['detail']['alamat'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="login-username">Provinsi</label>
                                                <select name="provinsi" class="form-control">
                                                    <option value="">-- Pilih Provinsi --</option>
                                                    @foreach ($provinsi as $prov)
                                                        @if($prov->idprovinsi == $profil['detail']['idprovinsi'])
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
                                                <select name="kota" class="form-control">
                                                    <option value="">-- Pilih Kota --</option>
                                                    @foreach ($kota as $kot)
                                                        @if($kot->idkota == $profil['detail']['idkota'])
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
                                                <input type="text" name="telp" class="form-control" placeholder="Masukkan no. telepon" value="{{ $profil['detail']['telepon'] }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="offset-6 col-sm-6 text-sm-right push">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="si si-login mr-10"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
