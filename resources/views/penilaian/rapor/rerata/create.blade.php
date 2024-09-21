@extends('layouts.app')

@section('content')

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col container">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="/penilaian/rapor/rerata" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('average.perform') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1: Data Siswa -->
                            <div id="step1">
                                <div class="card-body">
                                    <h3 class="card-title">Data Siswa</h3>
                                    <div class="row row-cards">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Tahun Ajaran</label>
                                                <select class="form-control form-select" name="tahun_ajaran">
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    @foreach(['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $year)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endforeach
                                                </select>
                                                @error('tahun_ajaran')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>
                                                <select class="form-control form-select" name="kelas">
                                                    <option value="">Pilih Kelas</option>
                                                    @foreach(['X', 'XI', 'XII', 'XIII'] as $kelas)
                                                        <option value="{{ $kelas }}">{{ $kelas }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kelas')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Semester</label>
                                                <select class="form-control form-select" name="semester">
                                                    <option value="">Pilih Semester</option>
                                                    @foreach(['1 (Ganjil)', '2 (Genap)'] as $semester)
                                                        <option value="{{ $semester }}">{{ $semester }}</option>
                                                    @endforeach
                                                </select>
                                                @error('semester')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Muatan Nasional -->
                            <div id="step2">
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
                                                           placeholder="Masukan Nilai" autocomplete="off">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Muatan Kewilayahan -->
                            <div id="step3">
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
                                                           placeholder="Masukan Nilai" autocomplete="off">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: C1. Dasar Bidang Keahlian -->
                            <div id="step4">
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
                                                           placeholder="Masukan Nilai" autocomplete="off">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5: C2. Dasar Program Keahlian -->
                            <div id="step5">
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
                                                           placeholder="Masukan Nilai" autocomplete="off">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Step 6: C3. Kompetensi Keahlian -->
                            <div id="step6">
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
                                                           placeholder="Masukan Nilai" autocomplete="off">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-secondary" id="prevButton" style="display: none;">Previous</button>
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
            const steps = ['step1', 'step2', 'step3', 'step4', 'step5', 'step6'];
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
