<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendapatan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Laporan Pendapatan

        @php
            $DataBulan = [
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ];
        @endphp
        {{ $DataBulan[$bulan] }}
    </h1>
    <h2></h2>

    <table>
        <thead>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <!-- tambahkan kolom lainnya jika diperlukan -->
            </tr>
        </thead>
        <tbody>
        @php
      $totalPemasukan = 0;
    @endphp
            @foreach($dataLaporan as $laporan)
                <tr>
                    <td>{{ $laporan->hari }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                    <td>{{ 'Rp ' . number_format($laporan->pemasukan, 0, ',', '.') }}</td> 
                    <!-- tambahkan kolom lainnya jika diperlukan -->
                </tr>
                @php
                  $totalPemasukan += $laporan->pemasukan;
                @endphp
            @endforeach
            <tr>
                <th class="text-center" style="align-items: center; text-align:center;" colspan="2">Total</th>
               <td class="">{{ 'Rp' . number_format($totalPemasukan, 0, ',', '.')}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
