@extends('layouts.app')

@section('content')

<div class="py-5">
    <div class="container xl-custom-container">
        <div class="d-flex justify-content-between mb-4">
            <a href="/penilaian" class="btn btn-secondary">Back</a>
            <div>
                <a href="{{ route('average') }}" class="btn btn-success mx-2">Rerata Mapel</a>
                <a href="{{ route('rapor.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            @foreach (['Tahun Ajaran', 'Kelas', 'Nama', 'PAI', 'PKN', 'B.Indo', 'MTK', 'Sejindo',
                            'B.Ingg', 'SBD', 'PJOK', 'Fisika', 'Kimia', 'SimDig', 'SisKom', 'KomJar', 'ProgDas', 'DDG',
                            'IaaS', 'PaaS', 'SaaS', 'SIoT', 'SKJ', 'PKK', '', '', ''] as $header)
                            <th>{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rapor as $item)
                        <tr>
                            @foreach ([
                            $item->tahun_ajaran,
                            $item->kelas,
                            $item->nama,
                            $item->muatan_nasional['pai']['nilai'] ?? 'N/A',
                            $item->muatan_nasional['pkn']['nilai'] ?? 'N/A',
                            $item->muatan_nasional['bindo']['nilai'] ?? 'N/A',
                            $item->muatan_nasional['mtk']['nilai'] ?? 'N/A',
                            $item->muatan_nasional['sejindo']['nilai'] ?? 'N/A',
                            $item->muatan_nasional['bhsAsing']['nilai'] ?? 'N/A',
                            $item->muatan_kewilayahan['sbd']['nilai'] ?? 'N/A',
                            $item->muatan_kewilayahan['pjok']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['fisika']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['kimia']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['simdig']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['siskom']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['komjar']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['progdas']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['ddg']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['iaas']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['paas']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['saas']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['siot']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['skj']['nilai'] ?? 'N/A',
                            $item->muatan_peminatan['pkk']['nilai'] ?? 'N/A',
                            ] as $value)
                            <td>{{ $value }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route('rapor.edit', $item->id) }}">
                                    <i class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('rapor.pdf', $item->id) }}">
                                    <i class="fa-solid fa-file-export text-white text-xl bg-green p-2 rounded"></i>
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
                            <td colspan="25" class="text-center">Tidak ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Danger Modal --}}
    @foreach ($rapor as $item)
<form action="{{ route('rapor.delete', $item->id) }}" method="post">
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
</div>
@endsection
