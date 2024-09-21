@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="container custom-container">
                <div class="col-12">
                    <div class="mb-4">
                        <div class="col-12 row">
                            <div class="mb-4 col">
                                <a href="/penilaian" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                            <div class="mb-4 col d-flex justify-content-end">
                                <a href="{{ route('rpts.create') }}" class="btn btn-primary">
                                    Tambah
                                </a>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                        <div>
                                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon alert-icon">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajaran</th>
                                        <th>Kelas</th>
                                        <th>Nama</th>
                                        <th>PAI</th>
                                        <th>PKN</th>
                                        <th>B.Indo</th>
                                        <th>MTK</th>
                                        <th>Sejindo</th>
                                        <th>B.Ingg</th>
                                        <th>SBD</th>
                                        <th>PJOK</th>
                                        <th>SimDig</th>
                                        <th>Fisika</th>
                                        <th>Kimia</th>
                                        <th>SisKom</th>
                                        <th>KomJar</th>
                                        <th>ProgDas</th>
                                        <th>DDG</th>
                                        <th>IaaS</th>
                                        <th>PaaS</th>
                                        <th>SaaS</th>
                                        <th>SIoT</th>
                                        <th>SKJ</th>
                                        <th>PKK</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($rpts as $item)
                                        <tr>
                                            <td>{{ $item->tahun_ajaran }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->pai }}</td>
                                            <td>{{ $item->pkn }}</td>
                                            <td>{{ $item->indo }}</td>
                                            <td>{{ $item->mtk }}</td>
                                            <td>{{ $item->sejindo }}</td>
                                            <td>{{ $item->bhs_asing }}</td>
                                            <td>{{ $item->sbd }}</td>
                                            <td>{{ $item->pjok }}</td>
                                            <td>{{ $item->simdig }}</td>
                                            <td>{{ $item->fis }}</td>
                                            <td>{{ $item->kim }}</td>
                                            <td>{{ $item->sis_kom }}</td>
                                            <td>{{ $item->komjar }}</td>
                                            <td>{{ $item->progdas }}</td>
                                            <td>{{ $item->ddg }}</td>
                                            <td>{{ $item->iaas }}</td>
                                            <td>{{ $item->paas }}</td>
                                            <td>{{ $item->saas }}</td>
                                            <td>{{ $item->siot }}</td>
                                            <td>{{ $item->skj }}</td>
                                            <td>{{ $item->pkk }}</td>
                                            <td>
                                                <a href="{{ route('rpts.edit', $item->id) }}">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-white text-xl bg-yellow p-2 rounded"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('rpts.pdf', $item->id) }}">
                                                    <i
                                                        class="fa-solid fa-file-export text-white text-xl bg-green p-2 rounded"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="" data-bs-toggle="modal"
                                                    data-bs-target="#modal-danger">
                                                    <i
                                                        class="far fa-trash-alt text-white text-xl bg-red p-2 rounded"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="25" class="text-center">
                                                Tidak ada Data
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Danger Modal --}}
    @foreach ($rpts as $item)
        <form action="{{ route('rpts.delete', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-status bg-danger"></div>
                        <div class="modal-body text-center py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
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
                                        <button href="#" type="submit" class="btn btn-danger w-100"
                                            data-bs-dismiss="modal">
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
