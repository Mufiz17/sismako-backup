@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <a href="/penilaian" class="btn btn-secondary">Back</a>
            </div>
            <div class="col text-end">
                <a href="{{ route('panitia.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Proker</th>
                            <th>Berita Acara</th>
                            <th>SK Panitia</th>
                            <th>Tatib</th>
                            <th>Surat Pemberitahuan</th>
                            <th>Jadwal</th>
                            <th>Denah</th>
                            <th>Daftar Hadir Panitia</th>
                            <th>Tanda Terima dan Penyerahan Soal</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($panitia as $item)
                        <tr>
                            <td>{{ $item->tahun_ajaran }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->proker, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->ba, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->sk_panitia, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->tatib, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->surat_pemberitahuan, '/'), 15   , '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->jadwal, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->denah, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->kehadiran_panitia, '/'), 5, '...') }}</td>
                            <td>{{ Str::limit(Str::afterLast($item->tanda_terima_dan_penerimaan_soal, '/'), 15, '...')
                                }}</td>
                            <td>
                                <a href="{{ route('panitia.edit', $item->id) }}">
                                    <i class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('panitia.download', $item->id) }}">
                                    <i class="fas fa-download text-white text-xl bg-green p-2 rounded"></i>
                                </a>
                            </td>
                            <td>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modal-danger-{{ $item->id }}">
                                    <i class="far fa-trash-alt text-white text-xl bg-red p-2 rounded"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center">Tidak ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Danger Modals -->
@foreach ($panitia as $item)
<form action="{{ route('panitia.delete', $item->id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="modal modal-blur fade" id="modal-danger-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path
                            d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                        </path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-secondary">Do you really want to remove this files? What you've done cannot
                        be
                        undone.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                            </div>
                            <div class="col">
                                <button href="#" type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection
