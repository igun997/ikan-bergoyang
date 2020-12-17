<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
  <title>Template Faktur Untuk Kasir HTML</title>
</head>
 
<body translate="no" >
 
 
  <div id="invoice-POS">
 
    <div id="mid">
      <div class="info">
        <h2>Informasi Pembelian</h2>
        <p> 
            No. Pembelian   : {{$pembelian->idpembelian}}<br>
            Supplier        : {{$pembelian->supplier->nama}}<br>
            Keterangan      : {{$pembelian->keterangan}}<br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
 
    <div id="bot">
 
                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <th class="item">Kode Barang</th>
                                <th class="Hours">Nama Barang</th>
                                <th class="Rate">Qty</th>
                            </tr>
<hr>
                            @foreach($produk as $p)
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">{{$p->barang->kodebarang}}</p></td>
                                <td class="tableitem"><p class="itemtext">{{$p->barang->nama_barang}}</p></td>
                                <td class="tableitem"><p class="itemtext">{{$p->qty}}</p></td>
                            </tr>

                            @endforeach
 <hr>
                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>@rupiah($pembelian->totalharga)</h2></td>
                            </tr>
 
                        </table>
                    </div><!--End Table-->
 
                    {{-- <div id="legalcopy">
                        <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong>  Barang yang sudah dibeli tidak dapat dikembalikan. Jangan lupa berkunjung kembali
                        </p>
                    </div> --}}
 
                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
 
</body>
 
</html>