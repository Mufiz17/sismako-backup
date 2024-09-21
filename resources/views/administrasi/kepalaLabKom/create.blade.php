@extends('layouts.app')

@section('content')
    <div class="py-12" style="padding-left: 1rem; padding-right: 1rem;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="mb-4 col">
                            <a href="{{ route('kepalaLabKom.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                        <h1>Create Kepala Lab Kom</h1>
                        <form action="{{ route('kepalaLabKom.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tatib</label>
                                            <input type="file" name="tatib_lab" class="form-control">
                                            @error('tatib_lab')
                                                <div class="text-danger mt-2"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Denah</label>
                                        <input type="file" name="denah_lab" class="form-control">
                                        @error('denah_lab')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Data Lab</label>
                                        <input type="file" name="data_lab" class="form-control">
                                        @error('data_lab')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Data Pengguna</label>
                                        <input type="file" name="data_pengguna" class="form-control">
                                        @error('data_pengguna')
                                            <div class="text-danger mt-2"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
