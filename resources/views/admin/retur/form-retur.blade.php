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
<h2 class="content-heading">{{ $title }} Pengajuan Retur Pembelian</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content">
        @include('message')
        <form class="form-horizontal" action="{{ url('/proses-retur/'.$pembelian->idpembelian) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-12">No Pembelian</label>
                <div class="col-md-12">
                    @if($title == 'Detail')
                        <input type="text" name="id" id="idpembelian" value="{{ $pembelian->idpembelian }}" class="form-control" readonly>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Supplier</label>
                @if($title != 'Detail')
                    <div class="col-md-12">
                        <select class="select2 form-control" name="idsupplier" data-placeholder="Masukan 1 atau lebih karakter untuk mencari..">
                            <option value="#">-- Pilih Supplier --</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->idsupplier }}" {{ (@old('idsupplier') && in_array($supplier->idsupplier, explode(',', old('idsupplier')))) ? 'selected' : ((@$pembelian->idsupplier && in_array($supplier->idsupplier, explode(',', @$pembelian->idsupplier))) ? 'selected' : '') }}>{{ $supplier->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="col-md-12">
                        <input type="text" name="id" value="{{ $pembelian->supplier->nama }}" class="form-control" readonly>
                    </div>
                @endif
            </div>
            <div class="form-group row">
                <label class="col-12">Kode Permintaan</label>
                <div class="col-12">
                    <input type="text" name="idpermintaan" id="idpermintaan" value="{{@$pembelian->idpermintaan}}" class="form-control" placeholder="Masukkan Kode permintaan" {{$title == 'Detail' ? 'readonly' : ''}}>
                </div>
                <div class="col-2">
                    @if($title != 'Detail')
                        <button class="btn btn-primary btnCekBarang">Cek Permintaan</button>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Total Harga Transaksi</label>
                <div class="col-md-12">
                    <input type="number" name="totalharga" value="{{@$pembelian->totalharga}}" class="form-control" placeholder="Masukan total harga" {{$title == 'Detail' ? 'readonly' : ''}}>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-12">Keterangan</label>
                <div class="col-md-12">
                    <textarea class="form-control" name="keterangan" cols="20" rows="5" placeholder="Masukan keterangan pembelian" {{$title == 'Detail' ? 'readonly' : ''}}>{{@$pembelian->keterangan}}</textarea>
                </div>
            </div>
            <div class="row">
                <label class="col-12">Daftar Barang yang dibeli</label>
                <div class="col-12"><hr></div>
                <div class="col-12 barang"></div>
                <div class="col-12"><hr></div>
            </div>
            <div class="form-group row">
                <label class="col-12">Jumlah barang yang akan diretur</label>
                @foreach(@$details as $detail)
                    <div>
                        <input type="hidden" id="idpembelian" name="idpembelian" value="{{ $pembelian->idpembelian }}">
                        <input type="hidden" id="idbarang[{{ $detail->idbarang }}]" name="idbarang[{{ $detail->idbarang }}]" value="{{ @$detail->idbarang }}" class="form-control">
                    </div>
                    <div class="col-12">
                        Barang {{ $loop->iteration }}:
                        <input type="number" id="qty[{{ $detail->idbarang }}]" name="qty[{{ $detail->idbarang }}]" min="0" max="{{ @$detail->qty }}" class="form-control" placeholder="Masukkan jumlah barang yang diretur" required="required">
                    </div>
                @endforeach
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-right">
                    <a href="#" data-url="{{ url('admin/proses-retur/'.$pembelian->idpembelian) }}" class="btn btn-danger btnRetur">Proses retur</a>
                </div>
            </div>
        </form>
        <form action="#" method="post" id="formRetur" class="d-none">
            @csrf
            @method('post')
        </form>
    </div>
</div>
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

        function getListBarang(kodepermintaan){
            $.ajax({
                url: "{{url('admin/pembelian-list/')}}/" + kodepermintaan,
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
            var kodepermintaan = $('#idpermintaan').val();
            getListBarang(kodepermintaan);
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
            var kodepermintaan = $('#idpermintaan').val();
            getListBarang(kodepermintaan);
        });

        $('.btnTerima').on('click', function(e){
            e.preventDefault();
            var idpembelian = $('#idpembelian').val();
            confirmBarang(idpembelian);
        });

        function confirmBarang(id){
            $.ajax({
                url: "{{url('admin/penerimaan')}}/"+id,
                success: function(res) {
                    location.reload();
                },
                type: 'GET'
            });
        }

        $(document).on('click', ':not(form)[data-confirm]', function(e){
            if(!confirm($(this).data('confirm'))){
                e.stopImmediatePropagation();
                e.preventDefault();
            }
        });

        
        $('body').on('click', '.btnRetur', function(e){
            e.preventDefault();

            var url = $(this).data('url');
            swal({
                    title: "Konfirmasi tindakan",
                    text: "Apakah anda yakin ingin melakukan pengajuan retur?",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#f33c37",
                    showLoaderOnConfirm: true,
                }).then(function(inputValue) {
                    console.log(inputValue.value);
                    if (inputValue.value===true) {
                        $('#formRetur').attr('action', url);
                        $('#formRetur').submit();
                    }
                });
        });

    </script>
@endsection