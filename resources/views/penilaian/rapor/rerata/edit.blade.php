@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col container">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="mb-4 col">
                        <a href="/penilaian/rapor/rerata" class="btn btn-secondary">Back</a>
                    </div>
                    <form class="card" action="{{ route('average.update', $average->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Step 1: Data Siswa --}}
                        <div id="step1">
                            <div class="card-body">
                                <h3 class="card-title">Data Siswa</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <select class="form-control form-select" name="tahun_ajaran">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                @foreach (['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $tahun)
                                                    <option value="{{ $tahun }}" {{ $average->tahun_ajaran == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
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
                                                @foreach (['X', 'XI', 'XII', 'XIII'] as $kelas)
                                                    <option value="{{ $kelas }}" {{ $average->kelas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
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
                                                @foreach (['1 (Ganjil)', '2 (Genap)'] as $semester)
                                                    <option value="{{ $semester }}" {{ $average->semester == $semester ? 'selected' : '' }}>{{ $semester }}</option>
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

                        {{-- Step 2: Muatan Nasional --}}
                        <div id="step2" style="display:none;">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Nasional</h3>
                                <div class="row row-cards">
                                    @php
                                        $subjects = [
                                            'pai' => 'Pendidikan Agama dan Budi Pekerti',
                                            'pkn' => 'Pendidikan Pancasila dan Kewarganegaraan',
                                            'indo' => 'Bahasa Indonesia',
                                            'mtk' => 'Matematika',
                                            'sejindo' => 'Sejarah Indonesia',
                                            'bhs_asing' => 'Bahasa Asing'
                                        ];
                                    @endphp
                                    @foreach ($subjects as $field => $label)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" name="{{ $field }}" placeholder="Masukan Nilai" value="{{ $average->$field }}" autocomplete="off">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Step 3: Muatan Kewilayahan --}}
                        <div id="step3" style="display:none;">
                            <div class="card-body">
                                <h3 class="card-title">Muatan Kewilayahan</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Seni Budaya</label>
                                            <input type="number" class="form-control" name="sbd" placeholder="Masukan Nilai" value="{{ $average->sbd }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">PJOK</label>
                                            <input type="number" class="form-control" name="pjok" placeholder="Masukan Nilai" value="{{ $average->pjok }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Step 4: C1 - Dasar Bidang Keahlian --}}
                        <div id="step4" style="display:none;">
                            <div class="card-body">
                                <h3 class="card-title">Dasar Bidang Keahlian (C1)</h3>
                                <div class="row row-cards">
                                    @php
                                        $c1_subjects = [
                                            'simdig' => 'Simulasi dan Komunikasi Digital',
                                            'fis' => 'Fisika',
                                            'kim' => 'Kimia'
                                        ];
                                    @endphp
                                    @foreach ($c1_subjects as $field => $label)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" name="{{ $field }}" placeholder="Masukan Nilai" value="{{ $average->$field }}" autocomplete="off">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Step 5: C2 - Dasar Program Keahlian --}}
                        <div id="step5" style="display:none;">
                            <div class="card-body">
                                <h3 class="card-title">Dasar Program Keahlian (C2)</h3>
                                <div class="row row-cards">
                                    @php
                                        $c2_subjects = [
                                            'sis_kom' => 'Sistem Komputer',
                                            'komjar' => 'Komputer dan Jaringan Dasar',
                                            'progdas' => 'Pemrograman Dasar',
                                            'ddg' => 'Dasar Desain Grafis'
                                        ];
                                    @endphp
                                    @foreach ($c2_subjects as $field => $label)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" name="{{ $field }}" placeholder="Masukan Nilai" value="{{ $average->$field }}" autocomplete="off">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Step 6: C3 - Kompetensi Keahlian --}}
                        <div id="step6" style="display:none;">
                            <div class="card-body">
                                <h3 class="card-title">Kompetensi Keahlian (C3)</h3>
                                <div class="row row-cards">
                                    @php
                                        $c3_subjects = [
                                            'iaas' => 'Infrastruktur Komputasi Awan',
                                            'paas' => 'Platform Komputasi Awan',
                                            'saas' => 'Layanan Komputasi Awan',
                                            'siot' => 'Sistem Internet of Things',
                                            'skj' => 'Sistem Keamanan Jaringan',
                                            'pkk' => 'Produk Kreatif dan Kewirausahaan',
                                        ];
                                    @endphp
                                    @foreach ($c3_subjects as $field => $label)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">{{ $label }}</label>
                                                <input type="number" class="form-control" name="{{ $field }}" placeholder="Masukan Nilai" value="{{ $average->$field }}" autocomplete="off">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                            <button type="submit" class="btn btn-success" id="submitBtn" style="display:none;">Submit</button>
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

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                document.getElementById(step).style.display = (index === stepIndex) ? 'block' : 'none';
            });
            document.getElementById('prevBtn').style.display = (stepIndex === 0) ? 'none' : 'inline-block';
            document.getElementById('nextBtn').style.display = (stepIndex === steps.length - 1) ? 'none' : 'inline-block';
            document.getElementById('submitBtn').style.display = (stepIndex === steps.length - 1) ? 'inline-block' : 'none';
        }

        document.getElementById('nextBtn').addEventListener('click', function() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        // Show the first step initially
        showStep(currentStep);
    });
</script>
@endsection
