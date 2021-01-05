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
        <h2 style="text-align: center">Data Laporan Pembelian pada bulan {{$namabulan}} {{$tahun}}</h2>
      </div>
    </div><!--End Invoice Mid-->
    
    @if(count($data) != 0)
    <div id="bot">
      <div id="table">
          <table border=1 width="100%" style="text-align:center">
              <tr class="tabletitle">
                  <th class="item">Tanggal</th>
                  <th class="Hours">Jumlah Barang yang dibeli</th>
                  <th>Stok Barang yang dibeli</th>
                  <th class="Rate">Total Harga</th>
              </tr>
              @foreach($data as $p)
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{$p->tanggal}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{$p->barang}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{$p->stok}}</p></td>
                    <td class="tableitem"><p class="itemtext">@rupiah($p->totalharga)</p></td>
                </tr>
              @endforeach
          </table>
      </div><!--End Table-->
  </div><!--End InvoiceBot-->
  @else
    <h5 style="text-align:center">Tidak ada data pembelian</h5>
  @endif
  </div><!--End Invoice-->
 
</body>
 
</html>