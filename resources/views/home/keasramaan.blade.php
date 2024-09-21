@extends('layouts.app')

@section('content')
@include('database.inc.form')

<div class="py-5">
    <div class="container">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 modals">
                <a href="{{ route('pin', ['redirect_url' => '/jamaah']) }}" class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color:  rgba(0, 128, 0, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/windows.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Sholat Berjamaah
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 modals">
                <a href="{{ route('pin', ['redirect_url' => '/patroli/asrama']) }}" class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color:rgba(0, 123, 255, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/search.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Patroli
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 modals">
                <a href="{{ route('pin', ['redirect_url' => '/sekolah-keasramaan/akses-lab']) }}"
                    class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color:rgba(255, 0, 0, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/computer.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Patroli
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="sekolah-keasramaan/akademik" class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color: rgba(0, 128, 0, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/education.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Akademik
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="sekolah-keasramaan/al-quran" class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color:  rgba(0, 123, 255, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/al-quran.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Al-Qur'an
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="sekolah-keasramaan/jurnal-asrama" class="text-decoration-none">
                    <div class="card shadow-sm mb-4 hover-shadow" style="background-color:rgba(255, 0, 0, 0.25);">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('dist/img/gif/journal.gif') }}" alt=""
                                style="width: 50%; height: auto; margin-right: 16px;">
                            <h2 class="card-title text-xl font-semibold mb-0"
                                style="font-size: 1.5rem; font-family: 'Poppins', sans-serif; font-weight: bold; color: white;">
                                Jurnal Asrama
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
