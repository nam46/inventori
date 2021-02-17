<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Masuk</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        .header {width:100%; text-align: center;line-height: 1em;border-bottom:2px solid #000;margin-bottom: 20px;}
        table, td, th {
            border: 1px solid black;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        @page {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Material Masuk</h1>
        <h1>Wijaya Las</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>KD Transaksi</th>
                <th>Tgl Masuk</th>
                <th>Suplier</th>
                <th>Nama Material</th>
                <th>Kategori</th>
                <th>Harga Satuan</th>
                <th>Jml</th>
                <th>Total</th>
              </tr>
        </thead>
        <tbody>
            @php
            $jumlah=0;
            $total=0;
            @endphp
            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->kode_transaksi_masuk }}</td>
                <td>{{ \Carbon\Carbon::parse($d->waktu_entri)->format('d F Y') }}</td>
                <td>{{ $d->nama_suplier }}</td>
                <td>{{ $d->nama_material }}</td>
                <td>{{ $d->nama_kategori }}</td>
                <td>@uang($d->harga_satuan)</td>
                <td>{{ $d->jumlah_material_masuk }}</td>
                <td>@uang($d->jumlah_material_masuk*$d->harga_satuan)</td>
              </tr>
              @php
               $jumlah+=$d->jumlah_material_masuk;
               $total+=$d->jumlah_material_masuk*$d->harga_satuan;
              @endphp
            @endforeach
            <tr>
                {{-- <td></td> --}}
                <td colspan="7" style="text-align: right;font-weight:bold;">Total</td>
                <td>{{ $jumlah }}</td>
                <td>@uang($total)</td>
              </tr>
        </tbody>
      </table>

</body>
</html>
