@extends('admin.laporan-layout')

@section('js')
    {{-- <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script> --}}
@endsection
@section('script')
    {{-- <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script> --}}
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.css"> --}}
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
<h2 class="content-heading text-center">Laporan Daftar Barang</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
            </thead>
            <tbody>
            @foreach($barangs as $key=>$barang)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $barang->kodebarang }}</td>
                    <td>
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
                    <td>{{ 'Rp'. number_format($barang->harga, 2, ',', '.') }}</td>
                    <td>{{ $barang->stok }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END Dynamic Table Full -->
@endsection
