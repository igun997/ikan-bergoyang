@extends('customer.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div id="basket" class="col-lg-12">
                        <div class="box">
                            @include('message')
                            <h1>List Order</h1>
                            <p class="text-muted">You currently have {{ $orders->count() }} order(s).</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No. Inv</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Detail Order</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($orders->count() == 0)
                                        <tr>
                                            <th colspan="6">No data order.</th>
                                        </tr>
                                    @endif
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td><strong>#{{ $order->id }}</strong></td>
                                        <td>{{ $order->delivery->nama }}</td>
                                        <td>{{ $order->delivery->alamat }}</td>
                                        <td>
                                            <ol>
                                                @foreach($order->detail as $detail)
                                                    <li>{{ @$detail->barang->nama_barang }} ({{ $detail->qty }} pcs)</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td>@rupiah($order->total_harga)</td>
                                        <td>
                                            <span class="d-block">
                                                {{ $order->transaksistatus->keterangan }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ url('/order/'.$order->id) }}" class="btn btn-block btn-primary btn-sm">Detail Order</a>
                                            @if($order->status == 1 || $order->status == 7)
                                                <a href="{{ url('/payment-info/'.$order->id) }}" class="btn btn-block btn-outline-primary btn-sm ml-0">Kirim Bukti Pembayaran</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($returs->count() != 0) { ?>
                <div class="container">
                    <div class="row">
                        <div id="basket" class="col-lg-12">
                            <div class="box">
                                <h1>List Retur</h1>
                                <p class="text-muted">You currently have {{ $returs->count() }} retur(s).</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Inv</th>
                                                <th>Tanggal Dibuat</th>
                                                <th>Alasan</th>
                                                <th>Bukti Barang</th>
                                                {{-- <th>Status</th> --}}
                                                @foreach($returs as $retur)
                                                    <?php if($retur->noresi != null){ ?>
                                                        <th>Nomor Resi</th>
                                                    <?php } ?>
                                                @endforeach
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($returs as $retur)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td><strong>#{{ $retur->transaksi_id }}</strong></td>
                                                    <td>{{ $retur->created_at }}</td>
                                                    <td>{{ $retur->reason }}</td>
                                                    <td>
                                                        <a target="_blank" href="{{ url('uploads/bukti-barang/') }}/{{$retur->bukti_barang}}">Lihat Bukti Barang</a>
                                                    </td>
                                                    {{-- <td>{{ $retur->status }}</td> --}}
                                                    <?php if($retur->noresi != null){ ?>
                                                        <td>{{ $retur->noresi }}</td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                        <a href="#" class="btn btn-danger btnDelete"><i class="fa fa-times" title="Cancel retur"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <form action="{{ url('retur/'.$retur->transaksi_id) }}" method="post" id="formDelete" class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
@endsection
