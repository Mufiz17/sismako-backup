@extends('layouts.app')

@section('content')
<style></style>
<link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <div class="banner">
        <div class="slider" style="--quantity: 11">
            @php
                $data = [
                    ['name' => 'Ahmad Dahlan, S.Ag', 'role' => 'Kepala SMK TI BAZMA (Inisiator & Pembuat Skema Alur Kerja)'],
                    ['name' => 'I Gde Bayu Priyambada M. S.Kom', 'role' => 'Kepala LABKOM & Guru IT'],
                    ['name' => 'Fadhil Rabbani XII', 'role' => 'Project Database'],
                    ['name' => 'Mufiz Ihsanulhaq XII', 'role' => 'Project Penilaian'],
                    ['name' => 'Attar Rifai XII', 'role' => 'Project Sarpras'],
                    ['name' => 'Muhammad Abdullah Al-Aziz XII', 'role' => 'Project Korespondensi'],
                    ['name' => 'Muhammad Saeful Romadhon XII', 'role' => 'Project Administrasi Keguruan'],
                    ['name' => 'Gemi Widodo XII', 'role' => 'Project PKG'],
                    ['name' => 'Hafith Muhammad Fauzan XII', 'role' => 'Project PKG'],
                    ['name' => 'Syahban Syahputra XII', 'role' => 'Project Keuangan'],
                    ['name' => 'Hanif Gibran Syidiq XII', 'role' => 'Project Keuangan'],
                ];
            @endphp

            @foreach ($data as $index => $person)
                <div class="item" style="--position: {{ $index + 1 }}">
                    <img src="{{ asset('dist/img/createdBy/dragon_' . ($index + 1) . '.png') }}" alt="">
                    <div class="overlay">
                        <h3>{{ $person['name'] }}</h3>
                        <p>{{ $person['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="content">
            <div class="author">
                <h2>SISMAKO</h2>
                <p><b>Sistem Manajemen Sekolah</b></p>
                <p>
                    Sistem integrasi data dan administrasi sekolah otomatis.
                </p>
            </div>
        </div>
    </div>
@endsection
