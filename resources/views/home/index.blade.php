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
                    <a href="{{ session('user_role') ? route('materi.index') : route('login') }}" class="btn btn-main px-4">
                        <i class="bi bi-play-circle me-1"></i> Mulai Belajar
                    </a>

                    @if (session('user_role'))
                        <a href="{{ session('user_role') === 'guru' ? route('admin.dashboard') : route('dashboard.siswa') }}" class="btn btn-soft px-4">
                            <i class="bi bi-speedometer2 me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-soft px-4">
                            <i class="bi bi-person-plus me-1"></i> Buat Akun
                        </a>
                    @endif
                </div>

                <div class="row g-3">
                    @foreach ([[$modules->count(), 'Sub Bab Materi'], [10, 'Soal per Quiz'], [20, 'Soal Evaluasi']] as $stat)
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
                                    Login, baca materi, lulus latihan, capai nilai quiz minimal, lalu lanjut ke materi berikutnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection