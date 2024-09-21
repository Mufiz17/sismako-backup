<!DOCTYPE html>
<html>

<head>

    <title>Surat Keluar</title>
    <style>
        body {
            font-family: 'arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #000000;
        }

        .container {
            width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            border: 1px solid #000000;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #000000;
        }

        table th {
            background-color: #000000;
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
    <h1>Daftar Surat Keluar</h1>
    <div class="container">
        <table class="table card-table table-vcenter text-nowrap datatable" style="width: 100%">
            <thead>
                <tr>
                    <th>Tahun Ajaran</th>
                    <th>Tanggal</th>
                    <th>No. Surat</th>
                    <th>Jenis Surat</th>
                    <th>Perihal</th>
                    <th>Kepada</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->tp }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->no_surat }}</td>
                        <td>{{ $item->jenis_surat }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>{{ $item->kepada }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

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
