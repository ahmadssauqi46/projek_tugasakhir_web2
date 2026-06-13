@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3"><i class="bi bi-person-circle"></i> Dashboard Siswa</span>
            <h2 class="fw-bold mb-2">Halo, {{ $name }}</h2>
            <p class="muted mb-0">Kelas {{ $class }}. Pantau progress belajar, nilai quiz, evaluasi, poin, dan ranking kamu.</p>
        </div>

        <div class="row g-3 mb-4">
            @foreach([
                ['Progress '.$progress.'%','bi-bar-chart'],
                ['Materi selesai '.$done.'/7','bi-cpu'],
                ['Materi terkunci '.$locked,'bi-lock'],
                ['Nilai quiz '.$quizScore,'bi-award'],
                ['Evaluasi '.$evaluasi,'bi-clipboard-check'],
                ['Poin '.$points,'bi-stars'],
                ['Leaderboard #'.$rank,'bi-trophy']
            ] as $c)
                <div class="col-md-3 col-6">
                    <div class="mini-card h-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box"><i class="bi {{ $c[1] }}"></i></div>
                            <b>{{ $c[0] }}</b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card-soft p-4 p-md-5 h-100">
                    <h5 class="fw-bold">Progress Belajar</h5>
                    <div class="progress my-3"><div class="progress-bar" style="width:{{ $progress }}%"></div></div>
                    <p class="small muted mb-0">Selesaikan materi dan latihan agar sub bab berikutnya terbuka.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-soft p-4 p-md-5 h-100">
                    <div class="icon-box mb-3"><i class="bi bi-arrow-right-circle"></i></div>
                    <h5 class="fw-bold">Lanjutkan Belajar</h5>
                    <p class="muted">{{ $next?->title ?? 'Pengertian Dasar Komputer' }}</p>
                    <a class="btn btn-main" href="{{ $next ? route('materi.show',$next) : route('materi.index') }}">Buka Materi</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
