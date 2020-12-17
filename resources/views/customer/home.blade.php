@extends('customer.layout')

@section('js')

@endsection

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center">Produk Pilihan Kami</h5>
                        <div class="row products" style="padding: 3% 15%;">
                            @foreach($produks as $produk)
                            <div class="col-lg-4 col-md-6">
                                <div class="product">
                                    <div style="height:300px">
                                        <a href="{{ asset('uploads/barang/'.$produk->gambar) }}">
                                            <img src="{{ asset('uploads/barang/'.$produk->gambar) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="{{ url('produk/'.$produk->id) }}">{{ $produk->nama_barang }}</a></h3>
                                        <p class="price">
                                            <del></del>@rupiah($produk->harga)
                                        </p>
                                        <p class="buttons">
                                            <a href="{{ url('produk/'.$produk->id) }}" class="btn btn-outline-secondary">View detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                {{ $produks->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
