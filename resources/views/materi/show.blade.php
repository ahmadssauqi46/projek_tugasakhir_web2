@extends('layouts.app')

@section('title', $module->title)

@section('content')
@php
    $minimumQuizScore = $minimumQuizScore ?? 70;
    $latihanCompleted = $latihanCompleted ?? false;
    $quizScore = $quizScore ?? null;
    $moduleCompleted = $moduleCompleted ?? false;
@endphp
<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <span class="chip mb-3">
                    <i class="bi bi-journal-text"></i>
                    Detail Materi
                </span>

                <h2 class="fw-bold mb-3">{{ $module->title }}</h2>

                <div class="card-soft p-4 p-md-5 mb-4 material-content">
                    {!! $module->content !!}

                    @if($module->video_url)
                        <hr class="my-4">
                        <a href="{{ $module->video_url }}" target="_blank" rel="noopener" class="btn btn-soft">
                            <i class="bi bi-play-btn me-1"></i> Buka Video Pembelajaran
                        </a>
                    @endif
                </div>

                <div class="exam-card">
                    <div class="exam-header">
                        <h4 class="fw-bold mb-1">Latihan Sub Bab</h4>
                        <p class="small muted mb-0">Kerjakan latihan sampai lulus, lalu lanjutkan quiz modul ini.</p>
                    </div>

                    <div class="exam-body">
                        @if (session('latihan_result'))
                            @php $r = session('latihan_result'); @endphp
                            <div class="alert {{ $latihanCompleted ? 'alert-success' : 'alert-warning' }}">
                                <b>Hasil Latihan:</b>
                                Benar {{ $r['correct'] }} dari {{ session('total') }} soal.
                                Nilai {{ $r['score'] }}.
                                @if ($latihanCompleted)
                                    Latihan sudah lulus. Silakan kerjakan quiz modul ini.
                                @else
                                    Ulangi latihan sampai mencapai minimal {{ session('minimum_correct') }} jawaban benar.
                                @endif
                            </div>
                        @endif

                        <form method="POST" action="{{ route('latihan.submit', $module) }}">
                            @csrf

                            @foreach ($questions as $q)
                                <div class="question-box">
                                    <div class="question-number">Soal Nomor {{ $loop->iteration }}</div>
                                    <p class="question-text">{{ $q->question }}</p>

                                    @foreach (['A' => 'option_a', 'B' => 'option_b', 'C' => 'option_c', 'D' => 'option_d'] as $key => $field)
                                        <label class="question-option">
                                            <input type="radio" name="answers[{{ $q->id }}]" value="{{ $key }}" required>
                                            <span><b>{{ $key }}.</b> {{ $q->$field }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach

                            <button class="btn btn-main px-4">Periksa Latihan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-soft p-4 sticky-top" style="top: 100px;">
                    <div class="device-box mb-4">
                        <i class="bi {{ $module->image ?: 'bi-cpu' }}"></i>
                    </div>

                    <h5 class="fw-bold">Aksi Pembelajaran</h5>
                    <p class="small muted">
                        Materi berikutnya baru terbuka setelah latihan selesai dan nilai quiz modul ini minimal {{ $minimumQuizScore }}.
                    </p>

                    <div class="mini-card mb-3 shadow-none">
                        <div>Latihan: <b>{{ $latihanCompleted ? 'Selesai' : 'Belum selesai' }}</b></div>
                        <div>Quiz: <b>{{ $quizScore === null ? 'Belum dikerjakan' : $quizScore }}</b></div>
                    </div>

                    @if($latihanCompleted && $quizScore === null)
                        <a href="{{ route('quiz.show', $module) }}" class="btn btn-main w-100 mb-2">
                            Kerjakan Quiz Modul
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @elseif($latihanCompleted && $quizScore !== null && $quizScore < $minimumQuizScore)
                        <button class="btn btn-soft w-100 mb-2" disabled>
                            Nilai quiz belum mencukupi
                        </button>
                    @elseif($moduleCompleted && $nextModule)
                        <a href="{{ route('materi.show', $nextModule) }}" class="btn btn-next-module w-100 mb-2">
                            Lanjut ke Modul Berikutnya
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @elseif($moduleCompleted)
                        <a href="{{ route('evaluasi.show') }}" class="btn btn-next-module w-100 mb-2">
                            Lanjut ke Evaluasi
                            <i class="bi bi-clipboard-check ms-1"></i>
                        </a>
                    @else
                        <button class="btn btn-soft w-100 mb-2" disabled>
                            Selesaikan latihan dulu
                        </button>
                    @endif

                    <a href="{{ route('materi.index') }}" class="btn btn-soft w-100">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali ke Materi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection