@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach([
                    ['title' => 'Administrasi Ujian', 'text' => 'Kelola ujian dan file-file terkait.', 'links' => [
                        ['route' => 'pts', 'label' => 'Pergi ke PTS'],
                        ['route' => 'pas', 'label' => 'Pergi ke PAS'],
                        ['route' => 'pat', 'label' => 'Pergi ke PAT'],
                        ['route' => 'panitia', 'label' => 'Pergi ke Panitia'],
                    ]],
                    ['title' => 'Rapor', 'text' => 'Melihat dan mengelola rapor siswa.', 'links' => [
                        ['route' => 'rapor', 'label' => 'Pergi ke Rapor'],
                        ['route' => 'rpts', 'label' => 'Pergi ke Rapor PTS'],
                        ['route' => 'finance', 'label' => 'Pergi ke Rapor Asrama'],
                    ]]
                ] as $card)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="card bg-white shadow-sm h-100">
                            <div class="card-body">
                                <h2 class="card-title">{{ $card['title'] }}</h2>
                                <p class="card-text">{{ $card['text'] }}</p>
                                @foreach($card['links'] as $link)
                                    <a href="{{ route($link['route']) }}" class="btn btn-primary me-2 mb-2">
                                        {{ $link['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
