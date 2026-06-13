@extends('layouts.app')

@section('content')
@php
    $modules = $modules ?? collect();
    $results = $results ?? collect();
    $progress = $progress ?? collect();
    $minimumQuizScore = $minimumQuizScore ?? 70;
@endphp
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3">
                <i class="bi bi-patch-question"></i>
                Kuis Interaktif
            </span>

            <h2 class="fw-bold mb-2">Pilih Kuis Berdasarkan Modul</h2>
            <p class="muted mb-0">Kuis terbuka setelah latihan modul selesai. Nilai minimal kelulusan adalah {{ $minimumQuizScore }}.</p>
        </div>

        @php
            $allQuizDone = $modules->count() > 0 && $modules->every(function ($module) use ($results, $minimumQuizScore) {
                return ($results[$module->id] ?? 0) >= $minimumQuizScore;
            });
        @endphp

        @if ($allQuizDone)
            <div class="card-soft p-4 mb-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h5 class="fw-bold mb-1"><i class="bi bi-check-circle text-primary me-1"></i> Semua Kuis Sudah Lulus</h5>
                    <p class="muted mb-0">Kamu sudah menyelesaikan seluruh kuis. Silakan lanjut ke evaluasi akhir.</p>
                </div>
                <a href="{{ route('evaluasi.show') }}" class="btn btn-main">Lanjut ke Evaluasi <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        @endif

        <div class="row g-4">
            @foreach($modules as $m)
                @php
                    $latihanDone = !empty($progress[$m->id]);
                    $score = $results[$m->id] ?? null;
                    $passed = $score !== null && $score >= $minimumQuizScore;
                @endphp
                <div class="col-md-6 col-xl-4">
                    <div class="card-soft card-hover p-4 h-100">
                        <div class="icon-box mb-3"><i class="bi {{ $m->image ?: 'bi-cpu' }}"></i></div>
                        <h5 class="fw-bold">{{ $m->title }}</h5>
                        <p class="small muted">{{ $m->summary }}</p>

                        @if($passed)
                            <span class="badge status-done mb-3">Lulus — Nilai {{ $score }}</span>
                            <button class="btn btn-soft btn-sm" disabled>Selesai</button>
                        @elseif(!$latihanDone)
                            <span class="badge status-lock mb-3">Latihan belum selesai</span>
                            <button class="btn btn-soft btn-sm" disabled><i class="bi bi-lock me-1"></i> Terkunci</button>
                        @else
                            @if($score !== null)
                                <span class="badge status-open mb-3">Nilai {{ $score }} — ulangi sampai {{ $minimumQuizScore }}</span>
                            @endif
                            <a class="btn btn-main btn-sm" href="{{ route('quiz.show', $m) }}">
                                <i class="bi bi-play-circle me-1"></i>
                                {{ $score === null ? 'Mulai Kuis' : 'Ulangi Kuis' }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection