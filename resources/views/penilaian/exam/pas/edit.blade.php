@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <a href="/penilaian/pas" class="btn btn-secondary">
                            Back
                        </a>
                    </div>
                    <form class="card" action="{{ route('pas.update', $pas->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <h3 class="card-title">Tambahkan Data</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tahun Ajaran</label>
                                        <select class="form-select" name="tahun_ajaran">
                                            <option value="">Pilih Tahun Ajaran</option>
                                            @foreach (['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $tahun)
                                                <option value="{{ $tahun }}"
                                                    {{ $pas->tahun_ajaran == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tahun_ajaran')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <select class="form-select" name="kelas">
                                            <option value="">Pilih Kelas</option>
                                            @foreach (['X', 'XI', 'XII', 'XIII'] as $kelas)
                                                <option value="{{ $kelas }}"
                                                    {{ $pas->kelas == $kelas ? 'selected' : '' }}>
                                                    {{ $kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Mapel</label>
                                        <select class="form-select" name="mapel">
                                            <option value="">Pilih Mapel</option>
                                            @foreach (['SAAS', 'PAAS', 'IAAS', 'SKJ', 'SIoT', 'PJOK', 'MTK', 'BIng', 'BInd', 'PAIBP', 'Kimia', 'Fisika', 'Seni', 'Sejarah', 'Pancasila'] as $mapel)
                                                <option value="{{ $mapel }}"
                                                    {{ $pas->mapel == $mapel ? 'selected' : '' }}>
                                                    {{ $mapel }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mapel')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @foreach (['kisi_kisi', 'soal', 'jawaban', 'kehadiran', 'daftar_nilai'] as $fileField)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                {{ ucwords(str_replace('_', ' ', $fileField)) }}
                                            </label>
                                            <input type="file" class="form-control" name="{{ $fileField }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = @json($pas);

            const setFileInput = (fileName, inputName) => {
                if (fileName) {
                    const inputElement = document.querySelector(`input[name="${inputName}"]`);
                    if (inputElement) {
                        fetch('/storage/' + fileName)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.blob();
                            })
                            .then(blob => {
                                const file = new File([blob], fileName, {
                                    type: blob.type,
                                    lastModified: new Date(),
                                });

                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(file);
                                inputElement.files = dataTransfer.files;
                            })
                            .catch(error => console.error('Error fetching file:', error));
                    }
                }
            };

            const array = ['kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran', 'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'];
            // Call the function with appropriate parameters
            array.forEach(v => {
                setFileInput(data[v], v);
            });
        });
    </script>
@endsection
