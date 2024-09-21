<!DOCTYPE html>
<html>

<head>
    <title>Surat Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #343a40;
        }

        .container {
            width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            border: 1px solid #343a40;
            /* Add border to the table */
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #343a40;
            /* Add border to table cells */
        }

        table th {
            background-color: #343a40;
            color: #ffffff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
            
        }
        .footer {
            margin-top: 50px;
            text-align: left;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h1>Daftar Surat Peringatan</h1>
    <table >
    <thead>
        <tr>
            <th>Tahun ajaran</th>
            <th>Tanggal</th>
            <th>No. surat</th>
            <th>subjek</th>
            <th>nama_siswa</th>
            <th>nama_guru</th>
            <th>alasan</th>
            <th>sp</th>
            <th>keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->tp }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->no_surat }}</td>
                <td>{{ $item->subjek }}</td>
                <td>{{ $item->siswa }}</td>
                <td>{{ $item->guru }}</td>
                <td>{{ $item->alasan }}</td>
                <td>{{ $item->sp }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="footer">
    <p>SMK TI BAZMA Islamic Boarding School</p>
    <p>Bogor, {{ now()->format('d F Y') }}</p>
    <br>
    <br>
    <b>Kepala Sekolah</b>
    <p>Ahmad Dahlan, S.Ag.</p>
</div>
</body>

</html>
