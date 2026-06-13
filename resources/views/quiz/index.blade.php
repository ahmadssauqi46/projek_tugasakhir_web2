@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3">
                <i class="bi bi-patch-question"></i>
                Kuis Interaktif
            </span>

            <h2 class="fw-bold mb-2">Pilih Kuis Berdasarkan Modul</h2>

            <p class="muted mb-0">
                Kuis berisi 10 soal, hanya dapat dikerjakan satu kali, dan nilai tersimpan ke database.
            </p>
        </div>

        @php
            $allQuizDone = $modules->count() > 0 && $modules->every(function ($module) use ($results) {
                return isset($results[$module->id]);
            });
        @endphp

        @if ($allQuizDone)
            <div class="card-soft p-4 mb-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h5 class="fw-bold mb-1">
                        <i class="bi bi-check-circle text-primary me-1"></i>
                        Semua Kuis Sudah Selesai
                    </h5>
                    <p class="muted mb-0">
                        Kamu sudah menyelesaikan seluruh kuis. Silakan lanjut ke evaluasi akhir.
                    </p>
                </div>

                <a href="{{ route('evaluasi.show') }}" class="btn btn-main">
                    Lanjut ke Evaluasi
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        @endif

        <div class="row g-4">
            @foreach($modules as $m)
                <div class="col-md-6 col-xl-4">
                    <div class="card-soft card-hover p-4 h-100">
                        <div class="icon-box mb-3">
                            <i class="bi {{ $m->image ?: 'bi-cpu' }}"></i>
                        </div>

                        <h5 class="fw-bold">{{ $m->title }}</h5>

                        <p class="small muted">
                            {{ $m->summary }}
                        </p>

                        @if(isset($results[$m->id]))
                            <span class="badge status-done mb-3">
                                Sudah dikerjakan — Nilai {{ $results[$m->id] }}
                            </span>

                            <button class="btn btn-soft btn-sm" disabled>
                                Selesai
                            </button>
                        @else
                            <a class="btn btn-main btn-sm" href="{{ route('quiz.show', $m) }}">
                                <i class="bi bi-play-circle me-1"></i>
                                Mulai Kuis
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection