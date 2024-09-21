@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="{{ route('walas.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <h1>Create Wali Kelas</h1>
                        <form action="{{ route('walas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card p-3">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Tahun Ajaran</label>
                                        <select class="form-control form-select" name="tahun_ajaran">
                                            <option value="">Pilih Tahun Ajaran</option>
                                            @foreach (generateTahunAjaran() as $tahun)
                                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @endforeach
                                        </select>
                                        @error('tahun_ajaran')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Penyerahan Rapor</label>
                                        <input type="file" name="penyerahan_rapor" class="form-control">
                                        @error('penyerahan_rapor')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
