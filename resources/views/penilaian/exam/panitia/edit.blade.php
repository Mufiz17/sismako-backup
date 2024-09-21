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
                <form class="card" action="{{ route('panitia.update', $panitia->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h3 class="card-title mb-4">Perbarui Data</h3>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tahun Ajaran</label>
                                <select class="form-select" name="tahun_ajaran">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    @foreach (['2024-2025', '2025-2026', '2026-2027', '2027-2028', '2028-2029', '2029-2030'] as $tahun)
                                        <option value="{{ $tahun }}"
                                            {{ $panitia->tahun_ajaran == $tahun ? 'selected' : '' }}>
                                            {{ $tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tahun_ajaran')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @foreach (['proker', 'ba', 'sk_panitia', 'tatib', 'surat_pemberitahuan', 'jadwal', 'denah', 'tanda_terima_dan_penerimaan_soal', 'kehadiran_panitia'] as $fileField)
                                <div class="col-sm-6 col-md-4 mb-3">
                                    <label class="form-label">
                                        {{ $fileField === 'ba' ? 'Berita Acara' : ucwords(str_replace('_', ' ', $fileField)) }}
                                    </label>
                                    <input type="file" class="form-control" name="{{ $fileField }}">
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = @json($panitia);
            console.log(data);

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

            const fileFields = ['kisi_kisi', 'soal', 'jawaban', 'proker', 'kehadiran', 'ba', 'sk_panitia', 'tatib',
                'surat_pemberitahuan', 'jadwal', 'denah', 'daftar_nilai', 'tanda_terima_dan_penerimaan_soal',
                'kehadiran_panitia'
            ];
            fileFields.forEach(v => {
                setFileInput(data[v], v);
            });
        });
    </script>
@endsection
