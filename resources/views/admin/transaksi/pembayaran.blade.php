@extends('admin.layout')

@section('js')
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/assets') }}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
@endsection
@section('script')
    <script src="{{ asset('admin-asset/assets') }}/js/pages/be_tables_datatables.js"></script>
    <script>
        $('.selectStatus').on('change', function(){
            var val = $(this).val();

            $(this).parents('form').submit();
        });
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
<h2 class="content-heading">{{$title}}</h2>

<!-- Dynamic Table Full -->
<div class="block">
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>No. Struk</th>
                <th>Bukti Pembayaran</th>
                <th>Total Bayar</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th class="text-center">Validasi Bukti Pembayaran</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>#{{ $transaksi->id }}</td>
                    <td>
                        @if($transaksi->buktipembayaran)
                        <a target="_blank" href="{{ url('uploads/barang/') }}/{{$transaksi->buktipembayaran}}">Lihat Bukti Pembayaran</a>
                        @else
                            Belum mengirimkan bukti pembayaran
                        @endif
                    </td>
                    <td>@rupiah($transaksi->total_harga)</td>
                    <td>{{ $transaksi->delivery->nama }}</td>
                    <td>{{ $transaksi->created_at }}</td>
                    {{-- <td>
                        <form action="{{ url('admin/transaksi/'.$transaksi->id) }}" method="post">
                            @csrf
                            @method('put')
                            <select name="status" class="form-control select2 selectStatus">
                                <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Sudah Bayar</option>
                                <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Dalam Pengiriman</option>
                                <option value="4" {{ $transaksi->status == 4 ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td> --}}
                    <td>{{$transaksi->transaksistatus->keterangan}}</td>
                    <td class="text-center">
                        @if($transaksi->status == 1)
                        <a href="{{ url('admin/confirm-pembayaran/'.$transaksi->id) }}" class="btn btn-block btn-primary">Konfirmasi Pembayaran</a>
                        @elseif($transaksi->status == 2)
                        <a href="{{ url('admin/confirm-pembayaran/'.$transaksi->id) }}" class="btn btn-block btn-primary">Terima</a>
                        <a href="{{ url('admin/reject-pembayaran/'.$transaksi->id) }}" class="btn btn-block btn-danger">Tolak</a>
                        @else
                        Menunggu mengirimkan bukti pembayaran baru
                        @endif
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
@endsection
