@extends('layouts.app')

@section('content')

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col container">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="/sekolah-keasramaan/al-quran/tahsin" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <form class="card" action="{{ route('tahsin.perform') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h3 class="card-title">Data Siswa</h3>
                                <div class="row row-cards">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal</label>
                                            <input type='date' class="form-control datepicker"
                                                placeholder="Masukan Tanggal" id="datepicker-icon-1" name="tanggal"
                                                autocomplete='off'>
                                            @error('tanggal')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Angkatan</label>
                                            <select class="form-control" name="angkatan" id="angkatan-select">
                                                <option value="">Pilih Angkatan</option>
                                                @foreach ($angkatan as $data)
                                                    <option value="{{ $data }}"
                                                        {{ old('angkatan') == $data ? 'selected' : '' }}>
                                                        {{ $data }}</option>
                                                @endforeach
                                            </select>
                                            @error('angkatan')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Nama Filter -->
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <select class="form-control" name="siswa_id" id="nama-select">
                                                <option value="">Pilih Nama</option>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                            @error('siswa_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Surat</label>
                                            <input type='text' class="form-control" placeholder="Masukan Surat"
                                                name="surat">
                                            @error('surat')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Ayat</label>
                                            <input type='text' class="form-control" placeholder="Masukan Ayat"
                                                name="ayat">
                                            @error('ayat')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Predikat</label>
                                            <select class="form-control form-select" name="predikat" required>
                                                <option value="">Pilih Predikat Bacaan</option>
                                                <option value="Sempurna"
                                                    {{ old('predikat') == 'Sempurna' ? 'selected' : '' }}>Sempurna
                                                </option>
                                                <option value="Baik"
                                                    {{ old('predikat') == 'Baik' ? 'selected' : '' }}>Baik
                                                </option>
                                                <option value="Cukup"
                                                    {{ old('predikat') == 'Cukup' ? 'selected' : '' }}>Cukup
                                                </option>
                                            </select>
                                            @error('predikat')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Pengajar</label>
                                            <select class="form-control form-select" name="pengajar" required>
                                                <option value="">Pilih Nama Pengajar</option>
                                                <option value="Ahmad Dahlan"
                                                    {{ old('pengajar') == 'Ahmad Dahlan' ? 'selected' : '' }}>Ahmad Dahlan
                                                </option>
                                                <option value="Ahmad Rifai"
                                                    {{ old('pengajar') == 'Ahmad Rifai' ? 'selected' : '' }}>Ahmad Rifai
                                                </option>
                                                <option value="Ratno Wijaya"
                                                    {{ old('pengajar') == 'Ratno Wijaya' ? 'selected' : '' }}>Ratno Wijaya
                                                </option>
                                            </select>
                                            @error('pengajar')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('angkatan-select').addEventListener('change', function() {
            const angkatan = this.value;
            const namesSelect = document.getElementById('nama-select');
            namesSelect.innerHTML = '<option value="">-- Pilih Nama --</option>';

            // Fetch the student names based on the selected angkatan
            fetch(`/api/siswa?angkatan=${angkatan}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(siswa => {
                        const option = document.createElement('option');
                        option.value = siswa.id;
                        console.log(siswa)
                        option.textContent = siswa.nama;
                        namesSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching names:', error));
        });
    </script>
@endsection
