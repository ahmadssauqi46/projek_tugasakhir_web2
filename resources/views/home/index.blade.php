@extends('layouts.app')

@section('title', 'EduTech Learning')

@section('content')
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="chip mb-4">
                    <i class="bi bi-stars"></i>
                    Media Pembelajaran Komputer Interaktif
                </span>

                <h1 class="hero-title mb-4">
                    Belajar Hardware dan Software Jadi Lebih Mudah
                </h1>

                <p class="hero-lead mb-4">
                    EduTech Learning membantu siswa memahami dasar komputer melalui materi bertahap,
                    latihan interaktif, quiz, evaluasi, progress belajar, dan leaderboard.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="{{ route('materi.index') }}" class="btn btn-main px-4">
                        <i class="bi bi-play-circle me-1"></i> Mulai Belajar
                    </a>

                    @if (session('user_role'))
                        <a href="{{ session('user_role') === 'guru' ? route('admin.dashboard') : route('dashboard.siswa') }}" class="btn btn-soft px-4">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-soft px-4">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    @endif
                </div>

                <div class="row g-3">
                    @foreach ([[7, 'Sub Bab Materi'], [10, 'Soal Quiz'], [20, 'Soal Evaluasi']] as $stat)
                        <div class="col-sm-4">
                            <div class="mini-card">
                                <h3 class="fw-bold text-primary mb-1">{{ $stat[0] }}</h3>
                                <p class="small mb-0">{{ $stat[1] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <div class="big-visual card-soft">
                    <div class="device-box">
                        <i class="bi bi-pc-display-horizontal"></i>
                    </div>

                    <div class="floating-info">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="icon-box">
                                <i class="bi bi-check2-circle"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-1">Alur Belajar Terarah</h5>
                                <p class="small mb-0">
                                    Siswa belajar dari materi, latihan, quiz, evaluasi, lalu melihat progress.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-5">
            @foreach ([
                ['Materi Bertahap', 'Materi disusun per sub bab agar mudah dipahami.', 'bi-journal-text'],
                ['Latihan Interaktif', 'Latihan dapat berupa pilihan ganda atau isian singkat.', 'bi-ui-checks'],
                ['Quiz Tersimpan', 'Nilai quiz disimpan dan dapat dilihat guru.', 'bi-patch-question'],
                ['Evaluasi Akhir', 'Evaluasi digunakan untuk mengukur pemahaman siswa.', 'bi-clipboard-check'],
                ['Progress Belajar', 'Siswa dapat melihat perkembangan belajarnya.', 'bi-graph-up'],
                ['Leaderboard', 'Peringkat siswa berdasarkan poin dan nilai.', 'bi-trophy']
            ] as $item)
                <div class="col-md-6 col-xl-4">
                    <div class="mini-card h-100">
                        <div class="d-flex gap-3">
                            <div class="icon-box">
                                <i class="bi {{ $item[2] }}"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-2">{{ $item[0] }}</h5>
                                <p class="small mb-0">{{ $item[1] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection