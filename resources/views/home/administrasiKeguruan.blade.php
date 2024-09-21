@extends('layouts.app')

@section('content')
    @include('database.inc.form')
    <style>
        .bg-red { background-color: rgba(255, 0, 0, 0.5); }
        .bg-blue { background-color: rgba(0, 0, 255, 0.5); }
        .bg-green { background-color: rgba(0, 255, 0, 0.5); }
        .card-body img { width: 50%; height: auto; margin-right: 16px; }
        .card-title { font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white; }
    </style>

    <div class="py-12">
        <div class="container">
            <div class="row">
                @php
                    $cards = [
                        ['url' => 'administrasi-keguruan/mapel', 'img' => 'mapel-unscreen.gif', 'title' => 'Mata Pelajaran', 'bg' => 'bg-red'],
                        ['url' => '#', 'img' => 'bk-unscreen.gif', 'title' => 'Bimbingan Konseling', 'bg' => 'bg-red'],
                        ['url' => 'administrasi-keguruan/kepalaLabKom', 'img' => 'lab-unscreen.gif', 'title' => 'Kepala LABKOM', 'bg' => 'bg-red'],
                        ['url' => 'administrasi-keguruan/osis', 'img' => 'student-unscreen.gif', 'title' => 'OSIS SMK', 'bg' => 'bg-blue'],
                        ['url' => 'administrasi-keguruan/perpustakaan', 'img' => 'shelves-unscreen.gif', 'title' => 'Library', 'bg' => 'bg-blue'],
                        ['url' => 'administrasi-keguruan/walas', 'img' => 'professor-unscreen.gif', 'title' => 'Wali Kelas', 'bg' => 'bg-blue'],
                        ['url' => 'administrasi-keguruan/kepsek', 'img' => 'headmaster-unscreen.gif', 'title' => 'Kepala Sekolah', 'bg' => 'bg-blue'],
                        ['url' => 'administrasi-keguruan/waka-kurikulum', 'img' => 'approved-unscreen.gif', 'title' => 'Waka Kurikulum', 'bg' => 'bg-green'],
                        ['url' => 'administrasi-keguruan/waka-kesiswaan', 'img' => 'kesiswaan-unscreen.gif', 'title' => 'Waka Kesiswaan', 'bg' => 'bg-green'],
                        ['url' => 'administrasi-keguruan/supervisi', 'img' => 'supervisi-unscreen.gif', 'title' => 'Supervisi', 'bg' => 'bg-green'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="col-md-{{ in_array($loop->iteration, [4,5,6,7]) ? 3 : 4 }}">
                        <a href="{{ $card['url'] }}" class="text-decoration-none">
                            <div class="card {{ $card['bg'] }} shadow-sm mb-4 hover-shadow">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('dist/img/gif/' . $card['img']) }}" alt="">
                                    <h2 class="card-title">{{ $card['title'] }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
