@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col container">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="mb-4 col">
                        <a href="/penilaian/rpts" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <form class="card" action="{{ route('rpts.update', $rpts->id) }}" method="post"
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
                                                <option value="2024-2025" {{ $rpts->tahun_ajaran == '2024-2025' ?
                                                    'selected' : '' }}>
                                                    2024-2025</option>
                                                <option value="2025-2026" {{ $rpts->tahun_ajaran == '2025-2026' ?
                                                    'selected' : '' }}>
                                                    2025-2026</option>
                                                <option value="2026-2027" {{ $rpts->tahun_ajaran == '2026-2027' ?
                                                    'selected' : '' }}>
                                                    2026-2027</option>
                                                <option value="2027-2028" {{ $rpts->tahun_ajaran == '2027-2028' ?
                                                    'selected' : '' }}>
                                                    2027-2028</option>
                                                <option value="2028-2029" {{ $rpts->tahun_ajaran == '2028-2029' ?
                                                    'selected' : '' }}>
                                                    2028-2029</option>
                                                <option value="2029-2030" {{ $rpts->tahun_ajaran == '2029-2030' ?
                                                    'selected' : '' }}>
                                                    2029-2030</option>
                                            </select>
                                            @error('tahun_ajaran')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option value="X" {{ $rpts->kelas == 'X' ? 'selected' : '' }}>
                                                    X</option>
                                                <option value="XI" {{ $rpts->kelas == 'XI' ? 'selected' : '' }}>XI
                                                </option>
                                                <option value="XII" {{ $rpts->kelas == 'XII' ? 'selected' : '' }}>XII
                                                </option>
                                                <option value="XIII" {{ $rpts->kelas == 'XIII' ? 'selected' : '' }}>XIII
                                                </option>
                                            </select>
                                            @error('kelas')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Semester</label>
                                            <select class="form-control form-select" name="semester">
                                                <option value="">Pilih Semester</option>
                                                <option value="GANJIL" {{ $rpts->semester == 'GANJIL' ?
                                                    'selected' : '' }}>1
                                                    (Ganjil)</option>
                                                <option value="GENAP" {{ $rpts->semester == 'GENAP' ? 'selected'
                                                    : '' }}>2
                                                    (Genap)</option>
                                            </select>
                                            @error('semester')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Siswa</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="nama" value="{{ $rpts->nama }}">
                                            @error('nama')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type='number' class="form-control" placeholder="Masukan Nama"
                                                name="nisn" value="{{ $rpts->nisn }}">
                                            @error('nisn')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
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
                                            <label class="form-label">Tanggal dikeluarkan</label>
                                            <input type='text' class="form-control datepicker"
                                                placeholder="Masukan Tanggal" id="datepicker-icon-1" name="released"
                                                autocomplete='off' value="{{ $rpts->released }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Walas</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="wname" value="{{ $rpts->wname }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Walas</label>
                                            <input type='text' class="form-control" placeholder="Masukan NIK" name="nip"
                                                value="{{ $rpts->nip }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kepala Sekolah</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="hmaster" value="{{ $rpts->hmaster }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Kepala Sekolah</label>
                                            <input type='text' class="form-control" placeholder="Masukan NIK"
                                                name="hmnip" value="{{ $rpts->hmnip }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step4">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Nasional</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Pendidikan Agama Islam dan Budi
                                                Pekerti</label>
                                            <input type="number" class="form-control" placeholder="Masukan Nilai"
                                                name="pai" value="{{ $rpts->pai }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Pendidikan Pancasila dan
                                                Kewarganegaraan</label>
                                            <input type="number" class="form-control" name="pkn"
                                                placeholder="Masukan Nilai" value="{{ $rpts->pkn }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Bahasa Indonesia</label>
                                            <input type='number' class="form-control" name="indo"
                                                placeholder="Masukan Nilai" value="{{ $rpts->indo }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Matematika</label>
                                            <input type='number' class="form-control" name="mtk"
                                                placeholder="Masukan Nilai" value="{{ $rpts->mtk }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sejarah Indonesia</label>
                                            <input type='number' class="form-control" name="sejindo"
                                                placeholder="Masukan Nilai" value="{{ $rpts->sejindo }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Bahasa Asing</label>
                                            <input type='number' class="form-control" name="bhs_asing"
                                                placeholder="Masukan Nilai" value="{{ $rpts->bhs_asing }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step5">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Kewilayahan</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Seni Budaya</label>
                                            <input type="number" class="form-control" name="sbd"
                                                placeholder="Masukan Nilai" value="{{ $rpts->sbd }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">PJOK</label>
                                            <input type="number" class="form-control" name="pjok"
                                                placeholder="Masukan Nilai" value="{{ $rpts->pjok }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step6">
                            <div class="card-body">
                                <h3 class="card-title">C1. Dasar Bidang Keahlian</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Simulasi dan Komunikasi Digital</label>
                                            <input type="number" class="form-control" name="simdig"
                                                placeholder="Masukan Nilai" value="{{ $rpts->simdig }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Fisika</label>
                                            <input type="number" class="form-control" name="fis"
                                                placeholder="Masukan Nilai" value="{{ $rpts->fis }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kimia</label>
                                            <input type="number" class="form-control" name="kim"
                                                placeholder="Masukan Nilai" value="{{ $rpts->kim }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step7">
                            <div class="card-body">
                                <h3 class="card-title">C2. Dasar Program Keahlian</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Komputer</label>
                                            <input type="number" class="form-control" name="sis_kom"
                                                placeholder="Masukan Nilai" value="{{ $rpts->sis_kom }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Komputer dan Jaringan</label>
                                            <input type="number" class="form-control" name="komjar"
                                                placeholder="Masukan Nilai" value="{{ $rpts->komjar }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Pemrograman Dasar</label>
                                            <input type="number" class="form-control" name="progdas"
                                                placeholder="Masukan Nilai" value="{{ $rpts->progdas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Dasar Design Grafis</label>
                                            <input type="number" class="form-control" name="ddg"
                                                placeholder="Masukan Nilai" value="{{ $rpts->ddg }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step8">
                            <div class="card-body">
                                <h3 class="card-title">C3. Kompetensi Keahlian</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Infrastruktur Komputasi Awan</label>
                                            <input type="number" class="form-control" name="iaas"
                                                placeholder="Masukan Nilai" value="{{ $rpts->iaas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Platform Komputasi Awan</label>
                                            <input type="number" class="form-control" name="paas"
                                                placeholder="Masukan Nilai" value="{{ $rpts->paas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Layanan Komputasi Awan</label>
                                            <input type="number" class="form-control" name="saas"
                                                placeholder="Masukan Nilai" value="{{ $rpts->saas }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Internet of Things</label>
                                            <input type="number" class="form-control" name="siot"
                                                placeholder="Masukan Nilai" value="{{ $rpts->siot }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sistem Keamanan Jaringan</label>
                                            <input type="number" class="form-control" name="skj"
                                                placeholder="Masukan Nilai" value="{{ $rpts->skj }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Produk Kreatif dan Kewirausahaan</label>
                                            <input type="number" class="form-control" name="pkk"
                                                placeholder="Masukan Nilai" value="{{ $rpts->pkk }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step9">
                            <div class="card-body">
                                <h3 class="card-title">Kehadiran (Walas)</h3>
                                <div class="row row-cards">
                                    <!-- Kehadiran -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Total Kehadiran</label>
                                            <input type="number" name="izin" id="izin" class="form-control"
                                                value="{{ $rpts->izin }}" required>
                                        </div>
                                    </div>
                                    <!-- Izin -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Izin</label>
                                            <input type="number" name="izin" id="izin" class="form-control"
                                                value="{{ $rpts->izin }}" required>
                                        </div>
                                    </div>
                                    <!-- Izin -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Izin</label>
                                            <input type="number" name="izin" id="izin" class="form-control"
                                                value="{{ $rpts->izin }}" required>
                                        </div>
                                    </div>
                                    <!-- Sakit -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Sakit</label>
                                            <input type="number" name="sakit" id="sakit" class="form-control"
                                                value="{{ $rpts->sakit }}" required>
                                        </div>
                                    </div>
                                    <!-- Alpha -->
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alpha</label>
                                            <input type="number" name="alpha" id="alpha" class="form-control"
                                                value="{{ $rpts->alpha }}" required>
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
    function initializeDatepickers() {
            var datepickers = document.querySelectorAll('[id^="datepicker-icon-"]');
            datepickers.forEach(function(datepicker) {
                new Litepicker({
                    element: datepicker,
                    format: 'DD MMMM YYYY', // Format tanggal
                    buttonText: {
                        previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                    locale: {
                        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ],
                        weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                    }
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const steps = ['step1', 'step2', 'step4', 'step5', 'step6', 'step7', 'step8', 'step9'];
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
