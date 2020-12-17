@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.full.min.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/select2/select2-bootstrap.min.css">
@endsection
@section('style')
    <style>
        .img-preview{
            width: 100px;
            margin-bottom: 20px;
            display: block;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">{{ $title }} Transaksi Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content">
        @include('message')
        <form class="form-horizontal" action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($title != 'Tambah')
                @method('put')
            @endif
            <div class="form-group row">
                <label class="col-12">No Permintaan</label>
                <div class="col-md-12">
                    <input type="text" name="id" value="{{ $nostruk }}" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <label class="col-12">Daftar Barang yang dibeli</label>
                <div class="col-12"><hr></div>
                <div class="col-12 barang"></div>
                <div class="col-12"><hr></div>
                <div class="col-12 text-center">
                    <button class="btn btn-primary btnModalTambahBarang" data-toggle="modal" data-target="#modalTambahBarang" type="button">Tambah Barang</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalTambahBarang">
    <form action="{{ url('admin/pengiriman') }}" method="post">
    @csrf
    <input type="hidden" name="id" id="idtransaksi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label for="kodebarang">Kode Barang</label>
                        <input type="text" id="kodebarang" class="form-control" name="kodebarang" placeholder="Masukkan kode barang">
                    </div>
                    <div class="col-12 mt-5">
                        <button type="button" class="btn btn-outline-primary btnCekBarang">Cek Kode Barang</button>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="form-group col-12 row">
                        <label class="col-12">Nama</label>
                        <div class="col-md-12">
                            <input type="text" name="nama_barang" id="namabarang" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-12">Kategori</label>
                        <div class="col-md-12">
                            <input type="text" name="nama_barang" id="kategori" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-12">Stok saat ini</label>
                        <div class="col-md-12">
                            <input type="number" name="stok" id="stok" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row col-12">
                        <label class="col-12">Harga satuan</label>
                        <div class="col-md-12">
                            <input type="number" name="harga" id="harga" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="form-group row col-12">
                        <label class="col-12">Jumlah Barang yang dibeli</label>
                        <div class="col-md-12">
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Masukan jumlah barang yang dibeli">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnTambahBarang">Tambah Barang</button>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- END Dynamic Table Full -->
@endsection
@section('script')
    <script>
        $('.select2').select2();

        $('.gambar').on('change', function(){
            var input = this;
            var url = $(this).val();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        });

        function getDataBarang(kodebarang){
            $.ajax({
                url: "{{url('admin/get-barang/')}}/" + kodebarang,
                success: function(res) {
                    console.log(res.data);
                    $('#namabarang').val(res.data.nama_barang);
                    $('#kategori').val(res.data.kategori);
                    $('#stok').val(res.data.stok);
                    $('#harga').val(res.data.harga);
                },
                type: 'GET'
            });
        }

        function getListBarang(){
            $.ajax({
                url: "{{url('admin/pembelian-list/')}}/{{ $nostruk }}",
                success: function(res) {
                    console.log(res.data);
                    if(res.data.length == 0){
                        $('.barang').html("<div class='text-center'>Belum ada barang yang diinput</div>");
                    }else{
                        var html = "";
                        $.each(res.data, function (idx, val) {
                            html = html.concat("<div class='row'><div class='col-2'><img src='{{url('uploads/barang')}}/"+val.barang.gambar+"' style='width:100%;height:100%'></div><div class='col-4'>"+val.barang.kodebarang+"</div><div class='col-4'>"+val.barang.nama_barang+"</div><div class='col-2'>Qty : "+val.qty+"</div></div>");
                        });
                        $('.barang').html(html);
                    }
                },
                type: 'GET'
            });
        }

        function tambahBarang(data){
            console.log(data);
            $.ajax({
                url: "{{url('admin/tambah-barang-pembelian')}}",
                data: data,
                dataType: 'json',
                success: function(res) {
                    $('#modalTambahBarang').modal('hide');
                    getListBarang();
                },
                type: 'POST'
            });
        }

        $( document ).ready(function() {
            getListBarang();
        });

        $('.btnModalTambahBarang').on('click', function(e){
            e.preventDefault();
            $('#kodebarang').val("");
            $('#namabarang').val("");
            $('#kategori').val("");
            $('#stok').val("");
            $('#harga').val("");
            $("#qty").val("");
        });

        $('.btnCekBarang').on('click', function(e){
            e.preventDefault();
            var kodebarang = $('#kodebarang').val();
            getDataBarang(kodebarang);
        });

        $('.btnTambahBarang').on('click', function(e){
            e.preventDefault();
            var idpembelian = "{{$nostruk}}";
            var kodebarang = $('#kodebarang').val();
            var qty = $('#qty').val();

            data = {
                _token: '{{csrf_token()}}',
                idpembelian : idpembelian,
                kodebarang : kodebarang,
                qty : qty
            };
            tambahBarang(data);
        });
    </script>
@endsection