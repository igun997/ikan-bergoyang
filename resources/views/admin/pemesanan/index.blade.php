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
<h2 class="content-heading">Daftar Pemesanan</h2>

<!-- Dynamic Table Full -->
    <div class="block-content block-content-full">
        @include('message')

        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No.Hp</th>
                <th>Email</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Bahan</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Gambar</th>
                <th>Status</th>
                <th class="text-center" style="width: 150px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pemesanan as $pesan)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>{{ $pesan->nama}}</td>
                    <td>{{ $pesan->no_hp}}</td>
                    <td>{{ $pesan->email}}</td>
                    <td>{{ $pesan->warna}}</td>
                    <td>{{ $pesan->ukuran}}</td>
                    <td>{{ $pesan->bahan}}</td>
                    <td>{{ $pesan->alamat}}</td>
                    <td>{{ $pesan->jumlah}}</td>
                    <td><img  src="{{ $pesan->gambar ? asset('uploads/pemesanan/'.$pesan->gambar) : '' }}" style="width: 100%">
                        </td>
                    <td>
                        <form action="{{ url('admin/daftarpemesanan/'.$pesan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <select name="status" class="form-control select2 selectStatus">
                                <option value="1" {{ $pesan->status == 1 ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="2" {{ $pesan->status == 2 ? 'selected' : '' }}>Dp 50%</option>
                                <option value="3" {{ $pesan->status == 3 ? 'selected' : '' }}>Lunas</option>
                                <option value="4" {{ $pesan->status == 4 ? 'selected' : '' }}>Dalam Pembuatan</option>
                                <option value="5" {{ $pesan->status == 5 ? 'selected' : '' }}>Dalam Pengiriman</option>
                                <option value="6" {{ $pesan->status == 6 ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ url('/admin/daftarpemesanan/'.$pesan->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btnDelete" data-url="{{ url('/admin/pemesanan/'.$pesan->id) }}"><i class="fa fa-trash"></i></a>
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
