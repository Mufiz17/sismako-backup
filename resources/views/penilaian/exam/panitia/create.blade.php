@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="/penilaian/panitia" class="btn btn-secondary">
                    Back
                </a>
            </div>
            <div class="col-12">
                <form class="card" action="{{ route('panitia.perform') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title mb-4">Tambahkan Data</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun Ajaran</label>
                                <select class="form-select" name="tahun_ajaran">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach(['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $year)
                                        <option value="{{ $year }}" {{ old('tahun_ajaran') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_ajaran')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @foreach(['proker', 'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'denah', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'] as $file)
                                <div class="col-sm-6 col-md-4 mb-3">
                                    <label class="form-label">{{ $file === 'ba' ? 'Berita Acara' : ucwords(str_replace('_', ' ', $file)) }}</label>
                                    <input type="file" class="form-control" name="{{ $file }}">
                                    @error($file)
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
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
