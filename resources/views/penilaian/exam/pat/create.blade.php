@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <a href="/penilaian/pat" class="btn btn-secondary">
                        Back
                    </a>
                </div>
                <form class="card" action="{{ route('pat.perform') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Tambahkan Data</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Tahun Ajaran</label>
                                    <select class="form-select" name="tahun_ajaran">
                                        <option value="">Pilih Tahun Ajaran</option>
                                        @foreach(['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $year)
                                            <option value="{{ $year }}" {{ old('tahun_ajaran') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun_ajaran')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <select class="form-select" name="kelas">
                                        <option value="">Pilih Kelas</option>
                                        @foreach(['X', 'XI', 'XII', 'XIII'] as $class)
                                            <option value="{{ $class }}" {{ old('kelas') == $class ? 'selected' : '' }}>{{ $class }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Mapel</label>
                                    <select class="form-select" name="mapel">
                                        <option value="">Pilih Mapel</option>
                                        @foreach(['SAAS', 'PAAS', 'IAAS', 'SKJ', 'SIoT', 'PJOK', 'MTK', 'BIng', 'BInd', 'PAIBP', 'Kimia', 'Fisika', 'Seni', 'Sejarah', 'Pancasila'] as $subject)
                                            <option value="{{ $subject }}" {{ old('mapel') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel')
                                        <div class="text-danger mt-2"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            @foreach(['kisi_kisi', 'soal', 'jawaban', 'kehadiran', 'daftar_nilai'] as $file)
                            <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ ucwords(str_replace('_', ' ', $file)) }}</label>
                                        <input type="file" class="form-control" name="{{ $file }}">
                                        @error($file)
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
