@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col container">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="mb-4 col">
                        <a href="/penilaian/rapor" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <form class="card" action="{{ route('rapor.update', $rapor->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="step1">
                            <div class="card-body">
                                <h3 class="card-title">Data Siswa</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <select class="form-control form-select" name="tahun_ajaran">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <option value="2024-2025" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2024-2025' ? 'selected' : '' }}>
                                                    2024-2025</option>
                                                <option value="2025-2026" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2025-2026' ? 'selected' : '' }}>
                                                    2025-2026</option>
                                                <option value="2026-2027" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2026-2027' ? 'selected' : '' }}>
                                                    2026-2027</option>
                                                <option value="2027-2028" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2027-2028' ? 'selected' : '' }}>
                                                    2027-2028</option>
                                                <option value="2028-2029" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2028-2029' ? 'selected' : '' }}>
                                                    2028-2029</option>
                                                <option value="2029-2030" {{ old('tahun_ajaran', $rapor->tahun_ajaran)
                                                    == '2029-2030' ? 'selected' : '' }}>
                                                    2029-2030</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option value="X" {{ old('kelas', $rapor->kelas) == 'X' ? 'selected' :
                                                    '' }}>X
                                                </option>
                                                <option value="XI" {{ old('kelas', $rapor->kelas) == 'XI' ? 'selected' :
                                                    '' }}>XI
                                                </option>
                                                <option value="XII" {{ old('kelas', $rapor->kelas) == 'XII' ? 'selected'
                                                    : '' }}>XII
                                                </option>
                                                <option value="XIII" {{ old('kelas', $rapor->kelas) == 'XIII' ?
                                                    'selected' : '' }}>XIII
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Semester</label>
                                            <select class="form-control form-select" name="semester">
                                                <option value="">Pilih Semester</option>
                                                <option value="1 (Ganjil)" {{ old('semester', $rapor->semester) == '1 (Ganjil)' ? 'selected' : '' }}>
                                                    1 (Ganjil)
                                                </option>
                                                <option value="2 (Genap)" {{ old('semester', $rapor->semester) == '2 (Genap)' ? 'selected' : '' }}>
                                                    2 (Genap)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="nama" value="{{ old('nama', $rapor->nama) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type='number' class="form-control" placeholder="Masukan NISN"
                                                name="nisn" value="{{ old('nisn', $rapor->nisn) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step2">
                            <div class="card-body">
                                <h3 class="card-title">Data Tambahan</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Dikeluarkan</label>
                                            <input type='date' class="form-control datepicker"
                                                placeholder="Masukan Tanggal" name="released"
                                                value="{{ old('released', $rapor->released) }}" autocomplete='off'>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Walas</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="wname" value="{{ old('wname', $rapor->wname) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Walas</label>
                                            <input type='number' class="form-control" placeholder="Masukan NIK"
                                                name="nip" value="{{ old('nip', $rapor->nip) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kepala Sekolah</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="hmaster" value="{{ old('hmaster', $rapor->hmaster) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Kepala Sekolah</label>
                                            <input type='number' class="form-control" placeholder="Masukan NIK"
                                                name="hmnip" value="{{ old('hmnip', $rapor->hmnip) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step3">
                            <div class="card-body">
                                <h3 class="card-title">Nilai Sikap</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Beriman, Bertakwa kepada Tuhan Yang Maha Esa, dan
                                                Berakhlak Mulia</label>
                                            <textarea name="attitude[beriman][deskripsi]" id="beriman_deskripsi"
                                                class="form-control">{{ old('attitude.beriman.deskripsi', $rapor->attitude['beriman']['deskripsi'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mandiri</label>
                                            <textarea name="attitude[mandiri][deskripsi]" id="mandiri_deskripsi"
                                                class="form-control">{{ old('attitude.mandiri.deskripsi', $rapor->attitude['mandiri']['deskripsi'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bergotong Royong</label>
                                            <textarea name="attitude[gotong_royong][deskripsi]"
                                                id="gotong_royong_deskripsi"
                                                class="form-control">{{ old('attitude.gotong_royong.deskripsi', $rapor->attitude['gotong_royong']['deskripsi'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Muatan Nasional -->
                        <div id="step4">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Nasional</h3>
                                <div class="row row-cards">
                                    <!-- Pendidikan Agama dan Budi Pekerti -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="pai_nilai" class="form-label">Pendidikan Agama Islam dan Budi
                                                Pekerti</label>
                                            <input type="number" name="muatan_nasional[pai][nilai]" id="pai_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_nasional['pai']['nilai'] ?? '' }}">
                                        </div>
                                    </div>
                                    <!-- Pendidikan Pancasila dan Kewarganegaraan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="pkn_nilai" class="form-label">Pendidikan Pancasila dan
                                                Kewarganegaraan</label>
                                            <input type="number" name="muatan_nasional[pkn][nilai]" id="pkn_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_nasional['pkn']['nilai'] ?? '' }}">
                                        </div>
                                    </div>
                                    <!-- Bahasa Indonesia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="bindo_nilai" class="form-label">Bahasa Indonesia</label>
                                            <input type="number" name="muatan_nasional[bindo][nilai]" id="bindo_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_nasional['bindo']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Pendidikan Agama Islam dan Budi Pekerti -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="pai_deskripsi" class="form-label">Deskripsi Pendidikan Agama
                                                Islam dan Budi Pekerti</label>
                                            <textarea name="muatan_nasional[pai][deskripsi]" id="pai_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['pai']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Pendidikan Pancasila dan Kewarganegaraan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="pkn_deskripsi" class="form-label">Deskripsi Pendidikan
                                                Pancasila dan Kewarganegaraan</label>
                                            <textarea name="muatan_nasional[pkn][deskripsi]" id="pkn_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['pkn']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Bahasa Indonesia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="bind_deskripsi" class="form-label">Deskripsi Bahasa
                                                Indonesia</label>
                                            <textarea name="muatan_nasional[bindo][deskripsi]" id="bindo_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['bindo']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Matematika -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="mtk_nilai" class="form-label">Matematika</label>
                                            <input type="number" name="muatan_nasional[mtk][nilai]" id="mtk_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_nasional['mtk']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Sejarah Indonesia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="sejindo_nilai" class="form-label">Sejarah Indonesia</label>
                                            <input type="number" name="muatan_nasional[sejindo][nilai]"
                                                id="sejindo_nilai" class="form-control"
                                                value="{{ $rapor->muatan_nasional['sejindo']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Bahasa Asing -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="bhsAsing_nilai" class="form-label">Bahasa Asing</label>
                                            <input type="number" name="muatan_nasional[bhsAsing][nilai]"
                                                id="bhsAsing_nilai" class="form-control"
                                                value="{{ $rapor->muatan_nasional['bhsAsing']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Matematika -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="mtk_deskripsi" class="form-label">Deskripsi Matematika</label>
                                            <textarea name="muatan_nasional[mtk][deskripsi]" id="mtk_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['mtk']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Sejarah Indonesia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="sejindo_deskripsi" class="form-label">Deskripsi Sejarah
                                                Indonesia</label>
                                            <textarea name="muatan_nasional[sejindo][deskripsi]" id="sejindo_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['sejindo']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Bahasa Asing -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label for="bhsAsing_deskripsi" class="form-label">Deskripsi Bahasa
                                                Asing</label>
                                            <textarea name="muatan_nasional[bhsAsing][deskripsi]"
                                                id="bhsAsing_deskripsi"
                                                class="form-control">{{ $rapor->muatan_nasional['bhsAsing']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Muatan Kewilayahan -->
                        <div id="step5">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Kewilayahan</h3>
                                <div class="row row-cards">
                                    <!-- Seni Budaya -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="sbd_nilai" class="form-label">Seni Budaya</label>
                                            <input type="number" name="muatan_kewilayahan[sbd][nilai]" id="sbd_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_kewilayahan['sbd']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- PJOK -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="pjok_nilai" class="form-label">PJOK</label>
                                            <input type="number" name="muatan_kewilayahan[pjok][nilai]" id="pjok_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_kewilayahan['pjok']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Seni Budaya -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="sbd_deskripsi" class="form-label">Deskripsi Seni
                                                Budaya</label>
                                            <textarea name="muatan_kewilayahan[sbd][deskripsi]" id="sbd_deskripsi"
                                                class="form-control">{{ $rapor->muatan_kewilayahan['sbd']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi PJOK -->
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="pjok_deskripsi" class="form-label">Deskripsi PJOK</label>
                                            <textarea name="muatan_kewilayahan[pjok][deskripsi]" id="pjok_deskripsi"
                                                class="form-control">{{ $rapor->muatan_kewilayahan['pjok']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: Muatan Teknologi -->
                        <div id="step6">
                            <div class="card-body">
                                <h3 class="card-title">C1. Dasar Bidang Keahlian</h3>
                                <div class="row row-cards">
                                    <!-- Simulasi dan Komunikasi Digital -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Simulasi dan Komunikasi Digital</label>
                                            <input type="number" name="muatan_peminatan[simdig][nilai]"
                                                id="simdig_nilai" class="form-control"
                                                value="{{ $rapor->muatan_peminatan['simdig']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Fisika -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fisika</label>
                                            <input type="number" name="muatan_peminatan[fisika][nilai]"
                                                id="fisika_nilai" class="form-control"
                                                value="{{ $rapor->muatan_peminatan['fisika']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Kimia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kimia</label>
                                            <input type="number" name="muatan_peminatan[kimia][nilai]" id="kimia_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['kimia']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Simulasi dan Komunikasi Digital -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Simulasi dan Komunikasi Digital</label>
                                            <textarea name="muatan_peminatan[simdig][deskripsi]" id="simdig_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['simdig']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Fisika -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Fisika</label>
                                            <textarea name="muatan_peminatan[fisika][deskripsi]" id="fisika_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['fisika']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Kimia -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Kimia</label>
                                            <textarea name="muatan_peminatan[kimia][deskripsi]" id="kimia_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['kimia']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step7">
                            <div class="card-body">
                                <h3 class="card-title">C2. Dasar Program Keahlian</h3>
                                <div class="row row-cards">
                                    <!-- Sistem Komputer -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Komputer</label>
                                            <input type="number" name="muatan_peminatan[siskom][nilai]"
                                                id="siskom_nilai" class="form-control"
                                                value="{{ $rapor->muatan_peminatan['siskom']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Komputer dan Jaringan -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Komputer dan Jaringan</label>
                                            <input type="number" name="muatan_peminatan[komjar][nilai]"
                                                id="komjar_nilai" class="form-control"
                                                value="{{ $rapor->muatan_peminatan['komjar']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Pemograman Dasar -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pemograman Dasar</label>
                                            <input type="number" name="muatan_peminatan[progdas][nilai]"
                                                id="progdas_nilai" class="form-control"
                                                value="{{ $rapor->muatan_peminatan['progdas']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Dasar Design Grafis -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Dasar Design Grafis</label>
                                            <input type="number" name="muatan_peminatan[ddg][nilai]" id="ddg_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['ddg']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Sistem Komputer -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Sistem Komputer</label>
                                            <textarea name="muatan_peminatan[siskom][deskripsi]" id="siskom_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['siskom']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Komputer dan Jaringan -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Komputer dan Jaringan</label>
                                            <textarea name="muatan_peminatan[komjar][deskripsi]" id="komjar_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['komjar']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Pemograman Dasar -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Pemograman Dasar</label>
                                            <textarea name="muatan_peminatan[progdas][deskripsi]" id="progdas_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['progdas']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Dasar Design Grafis -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Dasar Design Grafis</label>
                                            <textarea name="muatan_peminatan[ddg][deskripsi]" id="ddg_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['ddg']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step8">
                            <div class="card-body">
                                <h3 class="card-title">C3. Kompetensi Keahlian</h3>
                                <div class="row row-cards">
                                    <!-- Infrastruktur Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Infrastruktur Komputasi Awan</label>
                                            <input type="number" name="muatan_peminatan[iaas][nilai]" id="iaas_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['iaas']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Platform Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Platform Komputasi Awan</label>
                                            <input type="number" name="muatan_peminatan[paas][nilai]" id="paas_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['paas']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Layanan Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Layanan Komputasi Awan</label>
                                            <input type="number" name="muatan_peminatan[saas][nilai]" id="saas_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['saas']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Infrastruktur Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Infrastruktur Komputasi Awan</label>
                                            <textarea name="muatan_peminatan[iaas][deskripsi]" id="iaas_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['iaas']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Platform Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Platform Komputasi Awan</label>
                                            <textarea name="muatan_peminatan[paas][deskripsi]" id="paas_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['paas']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Layanan Komputasi Awan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Layanan Komputasi Awan</label>
                                            <textarea name="muatan_peminatan[saas][deskripsi]" id="saas_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['saas']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Sistem Internet of Things -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Internet of Things</label>
                                            <input type="number" name="muatan_peminatan[siot][nilai]" id="siot_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['siot']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Sistem Keamanan Jaringan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Keamanan Jaringan</label>
                                            <input type="number" name="muatan_peminatan[skj][nilai]" id="skj_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['skj']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Produk Kreatif dan Kewirausahaan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Produk Kreatif dan Kewirausahaan</label>
                                            <input type="number" name="muatan_peminatan[pkk][nilai]" id="pkk_nilai"
                                                class="form-control"
                                                value="{{ $rapor->muatan_peminatan['pkk']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Sistem Internet of Things -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Sistem Internet of Things</label>
                                            <textarea name="muatan_peminatan[siot][deskripsi]" id="siot_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['siot']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Sistem Keamanan Jaringan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Sistem Keamanan Jaringan</label>
                                            <textarea name="muatan_peminatan[skj][deskripsi]" id="skj_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['skj']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Produk Kreatif dan Kewirausahaan -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Produk Kreatif dan
                                                Kewirausahaan</label>
                                            <textarea name="muatan_peminatan[pkk][deskripsi]" id="pkk_deskripsi"
                                                class="form-control">{{ $rapor->muatan_peminatan['pkk']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step9">
                            <div class="card-body">
                                <h3 class="card-title">Ekstrakurikuler</h3>
                                <div class="row row-cards">
                                    <!-- Pramuka -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pramuka</label>
                                            <input type="text" name="extracurricular[pramuka][nilai]" id="pramuka_nilai"
                                                class="form-control"
                                                value="{{ $rapor->extracurricular['pramuka']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Bulu Tangkis -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bulu Tangkis</label>
                                            <input type="text" name="extracurricular[bultang][nilai]" id="bultang_nilai"
                                                class="form-control"
                                                value="{{ $rapor->extracurricular['bultang']['nilai'] ?? '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Futsal -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Futsal</label>
                                            <input type="text" name="extracurricular[futsal][nilai]" id="futsal_nilai"
                                                class="form-control"
                                                value="{{ $rapor->extracurricular['futsal']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Silat -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Silat</label>
                                            <input type="text" name="extracurricular[silat][nilai]" id="silat_nilai"
                                                class="form-control"
                                                value="{{ $rapor->extracurricular['silat']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Pramuka -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Pramuka</label>
                                            <textarea name="extracurricular[pramuka][deskripsi]" id="pramuka_deskripsi"
                                                class="form-control">{{ $rapor->extracurricular['pramuka']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Bulu Tangkis -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Bulu Tangkis</label>
                                            <textarea name="extracurricular[bultang][deskripsi]"
                                                id="bulu_tangkis_deskripsi"
                                                class="form-control">{{ $rapor->extracurricular['bultang']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Futsal -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Futsal</label>
                                            <textarea name="extracurricular[futsal][deskripsi]" id="futsal_deskripsi"
                                                class="form-control">{{ $rapor->extracurricular['futsal']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi Silat -->
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi Futsal</label>
                                            <textarea name="extracurricular[silat][deskripsi]" id="silat_deskripsi"
                                                class="form-control">{{ $rapor->extracurricular['silat']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step10">
                            <div class="card-body">
                                <h3 class="card-title">Kehadiran (Walas)</h3>
                                <div class="row row-cards">
                                    <!-- Izin -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Izin</label>
                                            <input type="number" name="izin" id="izin" class="form-control"
                                                value="{{ $rapor->izin }}" required>
                                        </div>
                                    </div>
                                    <!-- Sakit -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sakit</label>
                                            <input type="number" name="sakit" id="sakit" class="form-control"
                                                value="{{ $rapor->sakit }}" required>
                                        </div>
                                    </div>
                                    <!-- Alpha -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alpha</label>
                                            <input type="number" name="alpha" id="alpha" class="form-control"
                                                value="{{ $rapor->alpha }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step11">
                            <div class="card-body">
                                <h3 class="card-title">Prestasi Siswa</h3>
                                <div class="row row-cards">
                                    <!-- Prestasi 1 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 1</label>
                                            <input type="text" name="achievements[one][nilai]" id="one_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['one']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Prestasi 2 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 2</label>
                                            <input type="text" name="achievements[two][nilai]" id="two_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['two']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Prestasi 3 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 3</label>
                                            <input type="text" name="achievements[three][nilai]" id="three_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['three']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 1 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 1</label>
                                            <textarea name="achievements[one][deskripsi]" id="one_deskripsi"
                                                class="form-control">{{ $rapor->achievements['one']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 2 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 2</label>
                                            <textarea name="achievements[two][deskripsi]" id="two_deskripsi"
                                                class="form-control">{{ $rapor->achievements['two']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 3 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 3</label>
                                            <textarea name="achievements[three][deskripsi]" id="three_deskripsi"
                                                class="form-control">{{ $rapor->achievements['three']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Prestasi 4 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 4</label>
                                            <input type="text" name="achievements[four][nilai]" id="four_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['four']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Prestasi 5 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 5</label>
                                            <input type="text" name="achievements[five][nilai]" id="five_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['five']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Prestasi 6 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Prestasi 6</label>
                                            <input type="text" name="achievements[six][nilai]" id="six_nilai"
                                                class="form-control"
                                                value="{{ $rapor->achievements['six']['nilai'] ?? '' }}" required>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 4 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 4</label>
                                            <textarea name="achievements[four][deskripsi]" id="four_deskripsi"
                                                class="form-control">{{ $rapor->achievements['four']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 5 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 5</label>
                                            <textarea name="achievements[five][deskripsi]" id="five_deskripsi"
                                                class="form-control">{{ $rapor->achievements['five']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Deskripsi 6 -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi 6</label>
                                            <textarea name="achievements[six][deskripsi]" id="six_deskripsi"
                                                class="form-control">{{ $rapor->achievements['six']['deskripsi'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step12">
                            <div class="card-body">
                                <h3 class="card-title">Catatan Wali Kelas</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Catatan</label>
                                            <textarea class="form-control" name="note">{{ $rapor->note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-secondary" id="prevButton"
                                style="display: none;">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                            <button type="submit" class="btn btn-success d-none" id="submitButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5', 'step6', 'step7', 'step8', 'step9',
                'step10', 'step11', 'step12'
            ];
            let currentStep = 0;

            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');
            const submitButton = document.getElementById('submitButton');

            const toggleVisibility = (element, condition) => {
                element.style.display = condition ? 'none' : 'inline-block';
            };

            const showStep = (step) => {
                steps.forEach((id, index) => {
                    document.getElementById(id).classList.toggle('d-none', index !== step);
                });
                toggleVisibility(prevButton, step === 0);
                toggleVisibility(nextButton, step === steps.length - 1);
                submitButton.classList.toggle('d-none', step !== steps.length - 1);
            };

            nextButton.addEventListener('click', function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            prevButton.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep);
            initializeDatepickers();
        });
</script>
@endsection
