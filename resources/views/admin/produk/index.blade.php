@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script>
        function generateLaporan(){
            const kategori = $('#modal-filter .kategori').val()||null;
            const minstok = $('#modal-filter .minstok').val()||null;
            const maxstok = $('#modal-filter .maxstok').val()||null;
            let url = '{{url('admin/report/barang')}}';
            let params = '';

            if(kategori) params += '?kategori='+kategori;
            if(minstok) {
                if(params != '') params += '&minstok='+minstok;
                else params +='?minstok='+minstok;
            }
            if(maxstok) {
                if(params != '') params += '&maxstok='+maxstok;
                else params +='?maxstok='+maxstok;
            }

            location.href = url+params;
        }
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('style')
    <style>
        .table .img-preview{
            width: 70px;
            margin-right: 20px;
        }
    </style>
@endsection

@section('content')
<h2 class="content-heading">Daftar Produk</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-header block-header-default">
        <a href="{{ url('admin/barang/create') }}" class="btn btn-success btn-sm mb-25"><i class="fa fa-plus"></i> Tambah barang</a>

        <div class="btn btn-info btn-sm mb-25" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-file"></i> Buat Laporan</div>
    </div>
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Umur Barang</th>
                <th>Status Barang</th>
                <th class="text-center" style="width: 150px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->kodebarang }}</td>
                    <td>
                        <img class="img-preview" src="{{ $barang->gambar ? asset('uploads/barang/'.$barang->gambar) : '' }}" alt="gambar barang" >
                        <strong>{{ $barang->nama_barang }}</strong>
                    </td>
                    <td>{{ $barang->deskripsi ?? '-' }}</td>
                    <td>
                        @php
                            $id = explode(',', $barang->kategori_id);
                            $produkKategori = \App\Kategori::whereIn('id', $id)->get();
                        @endphp
                        @foreach($produkKategori as $key => $pk)
                            {{ $pk->nama_kategori.($key+1 == sizeof($produkKategori) ? '' : ',') }}
                        @endforeach
                    </td>
                    <td>{{ $barang->stok }}</td>
                    <td align="center">{{ \App\Models\Barang::find($barang->id)->barang_perawatans()->groupBy("tgl_pakan")->count() }} Hari</td>
                    <td align="center">{{ (\App\Models\Barang::find($barang->id)->barang_perawatans()->groupBy("tgl_pakan")->count() >= @\App\Models\Barang::find($barang->id)->barang_rules->first()->to_normal)?"Siap Jual":"Pembibitan" }}</td>
                    <td class="text-center">
                        <a href="{{ url('admin/barang/'.$barang->id.'/edit') }}" class="btn m-2 btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger m-2 btnDelete" data-url="{{ url('/admin/barang/'.$barang->id) }}"><i class="fa fa-trash"></i></a>
                        <a href="{{route("piara.list",$barang->id)}}" class="btn btn-primary btn-sm m-2">Pemeliharaan</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="#" method="post" id="formDelete" class="d-none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
<!-- END Dynamic Table Full -->

<div class="modal" tabindex="-1" role="dialog" id="modal-filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Filter Laporan</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select type="text" class="form-control kategori">
                            <option value="">Semua</option>
                            @foreach ($kategori as $item)
                                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <input type="number" class="form-control minstok" min=0 placeholder="Stok Terkecil">
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control maxstok" min=1 placeholder="Stok Terbesar">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="generateLaporan()">Download Laporan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
