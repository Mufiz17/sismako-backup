@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col container">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="mb-4 col">
                        <a href="/penilaian" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <form class="card" action="{{ route('rpts.perform') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Step 1: Data Siswa -->
                        <div id="step1">
                            <div class="card-body">
                                <h3 class="card-title">Data Siswa</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <select class="form-control form-select" name="tahun_ajaran" required>
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <option value="2024-2025" {{ old('tahun_ajaran')=='2024-2025'
                                                    ? 'selected' : '' }}>2024-2025
                                                </option>
                                                <option value="2025-2026" {{ old('tahun_ajaran')=='2025-2026'
                                                    ? 'selected' : '' }}>2025-2026
                                                </option>
                                                <option value="2026-2027" {{ old('tahun_ajaran')=='2026-2027'
                                                    ? 'selected' : '' }}>2026-2027
                                                </option>
                                                <option value="2027-2028" {{ old('tahun_ajaran')=='2027-2028'
                                                    ? 'selected' : '' }}>2027-2028
                                                </option>
                                                <option value="2028-2029" {{ old('tahun_ajaran')=='2028-2029'
                                                    ? 'selected' : '' }}>2028-2029
                                                </option>
                                                <option value="2029-2030" {{ old('tahun_ajaran')=='2029-2030'
                                                    ? 'selected' : '' }}>2029-2030
                                                </option>
                                            </select>
                                            @error('tahun_ajaran')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <select class="form-control form-select" name="kelas" required>
                                                <option value="">Pilih Kelas</option>
                                                <option value="X" {{ old('kelas')=='X' ? 'selected' : '' }}>X
                                                </option>
                                                <option value="XI" {{ old('kelas')=='XI' ? 'selected' : '' }}>XI
                                                </option>
                                                <option value="XII" {{ old('kelas')=='XII' ? 'selected' : '' }}>
                                                    XII</option>
                                                <option value="XIII" {{ old('kelas')=='XIII' ? 'selected' : '' }}>
                                                    XIII</option>
                                            </select>
                                            @error('kelas')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Semester</label>
                                            <select class="form-control form-select" name="semester" required>
                                                <option value="">Pilih Semester</option>
                                                <option value="GANJIL" {{ old('semester')=='GANJIL' ? 'selected'
                                                    : '' }}>1 (Ganjil)
                                                </option>
                                                <option value="GENAP" {{ old('semester')=='GENAP' ? 'selected'
                                                    : '' }}>2 (Genap)
                                                </option>
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
                                                name="nama" value="{{ old('nama') }}" required>
                                            @error('nama')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type='number' class="form-control" placeholder="Masukan NISN"
                                                name="nisn" value="{{ old('nisn') }}" required>
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
                                                value="{{ old('released') }}" autocomplete='off'>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Walas</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="wname" value="{{ old('wname') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Walas</label>
                                            <input type='number' class="form-control" placeholder="Masukan NIK"
                                                name="nip" value="{{ old('nip') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kepala Sekolah</label>
                                            <input type='text' class="form-control" placeholder="Masukan Nama"
                                                name="hmaster" value="{{ old('hmaster') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">NIK Kepala Sekolah</label>
                                            <input type='number' class="form-control" placeholder="Masukan NIK"
                                                name="hmnip" value="{{ old('hmnip') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Muatan Nasional -->
                        <div id="step3">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Nasional</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Pendidikan Agama dan Budi Pekerti' => 'pai',
                                    'Pendidikan Pancasila dan Kewarganegaraan' => 'pkn',
                                    'Bahasa Indonesia' => 'indo',
                                    'Matematika' => 'mtk',
                                    'Sejarah Indonesia' => 'sejindo',
                                    'Bahasa Asing' => 'bhs_asing'
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Muatan Kewilayahan -->
                        <div id="step4">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Kewilayahan</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Seni Budaya' => 'sbd',
                                    'PJOK' => 'pjok'
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: C1. Dasar Bidang Keahlian -->
                        <div id="step5">
                            <div class="card-body">
                                <h3 class="card-title">C1. Dasar Bidang Keahlian</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Simulasi dan Komunikasi Digital' => 'simdig',
                                    'Fisika' => 'fis',
                                    'Kimia' => 'kim'
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: C2. Dasar Program Keahlian -->
                        <div id="step6">
                            <div class="card-body">
                                <h3 class="card-title">C2. Dasar Program Keahlian</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Sistem Komputer' => 'sis_kom',
                                    'Komputer dan Jaringan' => 'komjar',
                                    'Pemograman Dasar' => 'progdas',
                                    'Dasar Design Grafis' => 'ddg'
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Step 7: C3. Kompetensi Keahlian -->
                        <div id="step7">
                            <div class="card-body">
                                <h3 class="card-title">C3. Kompetensi Keahlian</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Infrastruktur Komputasi Awan' => 'iaas',
                                    'Platform Komputasi Awan' => 'paas',
                                    'Layanan Komputasi Awan' => 'saas',
                                    'Sistem Internet of Things' => 'siot',
                                    'Sistem Keamanan Jaringan' => 'skj',
                                    'Produk Kreatif dan Kewirausahaan' => 'pkk'
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Step 8: Kehadiran -->
                        <div id="step8">
                            <div class="card-body">
                                <h3 class="card-title">Kehadiran</h3>
                                <div class="row row-cards">
                                    @foreach([
                                    'Kehadiran' => 'kehadiran',
                                    'Izin' => 'izin',
                                    'Sakit' => 'sakit',
                                    'Alpha' => 'alpha',
                                    ] as $label => $name)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $label }}</label>
                                            <input type="number" class="form-control" name="{{ $name }}"
                                                placeholder="Masukan Nilai">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
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
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5', 'step6', 'step7', 'step8'];
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

            // Initialize view
            showStep(currentStep);
        });
</script>

@endsection
