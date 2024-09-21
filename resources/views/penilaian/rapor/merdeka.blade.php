<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card</title>

    <style>
        body {
            font-family: Arial, sans-serif;

        }

        table.d-none {
            border: none;
            width: 100%
        }

        .d-none td {
            text-align: left;
            vertical-align: top;
        }

        .label {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
            width: 100px;
            /* Lebar tetap untuk label, disesuaikan sesuai kebutuhan */
            font-weight: bold;
            /* Menebalkan teks untuk label */
            vertical-align: top;
        }

        .long-label {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
            width: 150px;
            /* Lebar tetap untuk label, disesuaikan sesuai kebutuhan */
            font-weight: bold;
            /* Menebalkan teks untuk label */
            vertical-align: top;
        }

        .value {
            display: inline-block;
            /* Menampilkan sebagai blok sebaris */
        }

        .right {
            width: 55%;
        }

        .left {
            vertical-align: top;
            width: 45%;
        }

        .title {
            text-align: center;
            font-weight: bold;
        }

        .group {
            width: 100%;
        }

        .gap {
            width: 5%
        }

        .attendance {
            margin-left: 0;
            margin-right: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .achievements {
            margin-left: auto;
            margin-right: 0;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.attitudes,
        table.subjects,
        table.extracurricular,
        table.attendance,
        table.achievements {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.attitudes th,
        table.attitudes td,
        table.subjects th,
        table.subjects td,
        table.extracurricular th,
        table.extracurricular td,
        table.attendance th,
        table.attendance td,
        table.achievements th,
        table.achievements td,
        table.note th,
        table.note td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        table.attitudes th,
        table.subjects th,
        table.extracurricular th,
        table.attendance th,
        table.achievements th,
        table.note th {
            background-color: #83878d;
        }

        table.attitudes th.dimensi {
            width: 42%;
        }

        table.subjects th.no {
            width: 10%;
        }

        table.subjects th.mapel {
            width: 30%;
        }

        table.subjects th.grade {
            width: 10%;
        }

        table.subjects th.desc {
            width: 40%;
        }

        table.extracurricular th.no {
            width: 10%;
        }

        table.extracurricular th.name {
            width: 30%;
        }

        table.extracurricular th.rank {
            width: 10%;
        }

        table.extracurricular th.desc {
            width: 40%;
        }

        table.attendance th.no {
            width: 10.5%;
        }

        table.attendance th.type {
            width: 40%;
        }

        table.attendance th.total {
            width: 50%;
        }

        table.achievements th.no {
            width: 10.5%;
        }

        table.achievements th.type {
            width: 40%;
        }

        table.achievements th.desc {
            width: 50%;
        }

        .notes {
            margin-right: auto;
            margin-left: auto;
            width: 70%;
        }

        .note {
            margin: 20px auto;
            border-collapse: collapse;
            width: 100%;
        }

        .note th,
        .note td {
            text-align: center;
        }

        .signature {
            width: 100%;
        }

        .signature tr td {
            text-align: center;
        }

        .right-signature,
        .left-signature {
            width: 30%
        }

        .center-signature {
            width: 40%;
        }

        .center-signature {
            width: 40%;
        }

        td.name {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <p class="title">CAPAIAN HASIL BELAJAR PESERTA DIDIK</p>
    <table class="d-none">
        <tr>
            <td class="right">
                <span class="label">Nama</span>
                <span class="value">: {{ $rapor->nama }}</span>
                <br>
                <span class="label">NISN</span>
                <span class="value">: {{ $rapor->nisn }}</span>
                <br>
                <span class="label">Sekolah</span>
                <span class="value">: SMK TI BAZMA</span>
                <br>
                <span class="label">Alamat</span>
                <span class="value">: Jl. Raya Cikampak Cicadas,</span>
                <br>
                <span class="label"></span>
                <span class="value"> RT.1/RW.1, Cicadas, Kec.</span>
                <br>
                <span class="label"></span>
                <span class="value"> Ciampea, Kabupaten Bogor,</span>
                <br>
                <span class="label"></span>
                <span class="value"> Jawa Barat 16620</span>
            </td>
            <td class="center"></td>
            <td class="left">
                <span class="long-label">Kelas</span>
                <span class="value">: {{ $rapor->kelas }}</span>
                <br>
                <span class="long-label">Semester</span>
                <span class="value">: {{ $rapor->semester }}</span>
                <br>
                <span class="long-label">Tahun Pelajaran</span>
                <span class="value">: {{ $rapor->tahun_ajaran }}</span>
                <br>
            </td>
        </tr>
    </table>

    <h3>A. Sikap</h3>
    <table class="attitudes">
        <thead>
            <tr>
                <th class="dimensi">Dimensi</th>
                <th class="penjelasan">Penjelasan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia</td>
                <td>{{ $rapor->attitude['beriman']['deskripsi'] }}</td>
            </tr>
            <tr>
                <td>Mandiri</td>
                <td>{{ $rapor->attitude['mandiri']['deskripsi'] }}</td>
            </tr>
            <tr>
                <td>Bergotong royong</td>
                <td>{{ $rapor->attitude['gotong_royong']['deskripsi'] }}</td>
            </tr>
        </tbody>
    </table>

    <h3>B. Nilai Akademik</h3>
    @php
        $i = 1;
    @endphp
    <table class="subjects">
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="mapel">Mata Pelajaran</th>
                <th class="grade">Nilai</th>
                <th class="desc">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="group-header">
                <td style="text-align: center;" colspan="1"><strong>A</strong></td>
                <td colspan="3"><strong>Muatan Nasional</strong></td>
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['pai']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Pendidikan Agama dan Budi Pekerti</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['pai']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['pai']['deskripsi'] }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['pkn']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Pendidikan Pancasila dan Kewarganegaraan</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['pkn']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['pkn']['deskripsi'] }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['bindo']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Bahasa Indonesia</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['bindo']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['bindo']['deskripsi'] }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['mtk']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Matematika</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['mtk']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['mtk']['deskripsi'] }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['sejindo']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Sejarah Indonesia</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['sejindo']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['sejindo']['deskripsi'] }}</td>
                @endif
            </tr>
            <tr>
                @if (!empty($rapor->muatan_nasional['bhsAsing']['nilai']))
                    <td style="text-align: center;">{{ $i++ }}</td>
                    <td>Bahasa Inggris</td>
                    <td style="text-align: center;">{{ $rapor->muatan_nasional['bhsAsing']['nilai'] }}</td>
                    <td>{{ $rapor->muatan_nasional['bhsAsing']['deskripsi'] }}</td>
                @endif
            </tr>
            @if (!empty($rapor->muatan_kewilayahan['sbd']['nilai'] || $rapor->muatan_kewilayahan['pjok']['nilai']))

                <tr class="group-header">
                    <td style="text-align: center;" colspan="1"><strong>B</strong></td>
                    <td colspan="3"><strong>Muatan Kewilayahan</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_kewilayahan['sbd']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Seni Budaya</td>
                        <td style="text-align: center;">{{ $rapor->muatan_kewilayahan['sbd']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_kewilayahan['sbd']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_kewilayahan['pjok']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Pendidikan Jasmani, Olahraga, dan Kesehatan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_kewilayahan['pjok']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_kewilayahan['pjok']['deskripsi'] }}</td>
                </tr>
            @endif
            @endif

            <tr class="group-header">
                <td style="text-align: center;" colspan="1"><strong>C</strong></td>
                <td colspan="3"><strong>Kompetensi Keahlian</strong></td>
            </tr>
            @if (
                !empty(
                    $rapor->muatan_peminatan['simdig']['nilai'] ||
                        $rapor->muatan_peminatan['fisika']['nilai'] ||
                        $rapor->muatan_peminatan['kimia']['nilai']
                ))
                <tr class="group-header">
                    <td colspan="4"><strong>C1. Dasar Bidang Keahlian</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['simdig']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Simulasi dan Komunikasi Digital</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['simdig']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['simdig']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['fisika']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Fisika</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['fisika']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['fisika']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['simdig']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Kimia</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['simdig']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['simdig']['nilai'] }}</td>
                    @endif
                </tr>
            @endif
            @if (
                !empty(
                    $rapor->muatan_peminatan['siskom']['nilai'] ||
                        $rapor->muatan_peminatan['komjar']['nilai'] ||
                        $rapor->muatan_peminatan['progdas']['nilai'] ||
                        $rapor->muatan_peminatan['ddg']['nilai']
                ))

                <tr class="group-header">
                    <td colspan="4"><strong>C2. Dasar Program Keahlian</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['siskom']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Komputer</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['siskom']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['siskom']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['komjar']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Komputer dan Jaringan Dasar</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['komjar']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['komjar']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['progdas']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Pemrograman Dasar</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['progdas']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['progdas']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['ddg']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Dasar Desain Grafis</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['ddg']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['ddg']['deskripsi'] }}</td>
                    @endif
                </tr>
            @endif
            @if (
                !empty(
                    $rapor->muatan_peminatan['iaas']['nilai'] ||
                        $rapor->muatan_peminatan['paas']['nilai'] ||
                        $rapor->muatan_peminatan['saas']['nilai'] ||
                        $rapor->muatan_peminatan['siot']['nilai'] ||
                        $rapor->muatan_peminatan['skj']['nilai'] ||
                        $rapor->muatan_peminatan['pkk']['nilai']
                ))

                <tr class="group-header">
                    <td colspan="4"><strong>C3. Kompetensi Keahlian</strong></td>
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['iaas']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Infrastruktur Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['iaas']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['iaas']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['paas']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Platform Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['paas']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['paas']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['saas']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Layanan Komputasi Awan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['saas']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['saas']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['siot']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Internet of Things</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['siot']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['siot']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['skj']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Sistem Keamanan Jaringan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['skj']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['skj']['deskripsi'] }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!empty($rapor->muatan_peminatan['pkk']['nilai']))
                        <td style="text-align: center;">{{ $i++ }}</td>
                        <td>Produk Kreatif dan Kewirausahaan</td>
                        <td style="text-align: center;">{{ $rapor->muatan_peminatan['pkk']['nilai'] }}</td>
                        <td>{{ $rapor->muatan_peminatan['pkk']['deskripsi'] }}</td>
                    @endif
                </tr>
            @endif
        </tbody>
    </table>

    <h3>C. Ekstrakurikuler</h3>
    <table class="extracurricular">
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="name">Nama Kegiatan</th>
                <th class="rank">Predikat</th>
                <th class="desc">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">1</td>
                <td>Pramuka</td>
                <td style="text-align: center;">{{ $rapor->extracurricular['pramuka']['nilai'] }}</td>
                <td>{{ $rapor->extracurricular['pramuka']['deskripsi'] }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">2</td>
                <td>Bulu Tangkis</td>
                <td style="text-align: center;">{{ $rapor->extracurricular['bultang']['nilai'] }}</td>
                <td>{{ $rapor->extracurricular['bultang']['deskripsi'] }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">3</td>
                <td>Futsal</td>
                <td style="text-align: center;">{{ $rapor->extracurricular['futsal']['nilai'] }}</td>
                <td>{{ $rapor->extracurricular['futsal']['deskripsi'] }}</td>
            </tr>
            <tr>
                <td style="text-align: center;">4</td>
                <td>Silat</td>
                <td style="text-align: center;">{{ $rapor->extracurricular['silat']['nilai'] }}</td>
                <td>{{ $rapor->extracurricular['silat']['deskripsi'] }}</td>
            </tr>
        </tbody>
    </table>

    <table class="group">
        <tr>
            <td style="vertical-align: top">
                <table class="attendance">
                    <thead>
                        <tr>
                            <th class="no">No</th>
                            <th class="type">Jenis</th>
                            <th class="total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>Sakit</td>
                            <td>{{ $rapor->sakit }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>Izin</td>
                            <td>{{ $rapor->izin }}</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3</td>
                            <td>Alpha</td>
                            <td>{{ $rapor->alpha }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="gap"></td>
            @php
                $index = 0;
            @endphp
            <td>
                <table class="achievements">
                    <thead>
                        <tr>
                            <th class="no">No</th>
                            <th class="type">Jenis Prestasi</th>
                            <th class="desc">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (
                            !empty($rapor->achievements['one']['nilai']) ||
                                !empty($rapor->achievements['two']['nilai']) ||
                                !empty($rapor->achievements['three']['nilai']) ||
                                !empty($rapor->achievements['four']['nilai']) ||
                                !empty($rapor->achievements['five']['nilai']) ||
                                !empty($rapor->achievements['six']['nilai']))
                            <tr>
                                <td style="text-align: center;">{{ $index + 1 }}</td>
                                <td>{{ $rapor->achievements['one']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['one']['deskripsi'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $index + 2 }}</td>
                                <td>{{ $rapor->achievements['two']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['two']['deskripsi'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $index + 3 }}</td>
                                <td>{{ $rapor->achievements['three']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['three']['deskripsi'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $index + 4 }}</td>
                                <td>{{ $rapor->achievements['four']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['four']['deskripsi'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $index + 5 }}</td>
                                <td>{{ $rapor->achievements['five']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['five']['deskripsi'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $index + 6 }}</td>
                                <td>{{ $rapor->achievements['six']['nilai'] }}</td>
                                <td>{{ $rapor->achievements['six']['deskripsi'] ?? '' }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">Tidak ada prestasi yang tersedia</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </td>
        </tr>
    </table>


    <table class="notes">
        <tr>
            <td>
                <table class="note">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Catatan Wali Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">{{ $rapor->note }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <table class="signature">
        <tr>
            <td class='right-signature'>Orang Tua/Wali,</td>
            <td class="center-signature"></td>
            <td class='left-signature'>Wali Kelas</td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br></td>
            <td><br><br><br> Mengetahui,<br>Kepala SMK TI BAZMA</td>
            <td><br><br><br><br><br><br></td>
        </tr>
        <tr>
            <td>________________</td>
            <td></td>
            <td class="name">{{ $rapor->wname }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>NIK. {{ $rapor->nip }}</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding: 40px"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="name">{{ $rapor->hmaster }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>NIK. {{ $rapor->hmnip }}</td>
            <td></td>
        </tr>
    </table>
</body>

</html>
