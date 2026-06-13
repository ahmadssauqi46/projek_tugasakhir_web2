@extends('layouts.app')

@section('content')
@php
    $modules = $modules ?? collect();
    $progress = $progress ?? collect();
    $quizScores = $quizScores ?? collect();
    $minimumQuizScore = $minimumQuizScore ?? 70;
@endphp
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3">
                <i class="bi bi-journal-text"></i> Materi Pembelajaran
            </span>
            <h2 class="fw-bold mb-2">Belajar Dasar Komputer Secara Bertahap</h2>
            <p class="muted mb-0">Materi berikutnya terbuka setelah latihan selesai dan nilai quiz materi sebelumnya minimal {{ $minimumQuizScore }}.</p>
        </div>

        <div class="row g-4">
            @foreach($modules as $module)
                @php
                    $previous = $loop->index > 0 ? $modules[$loop->index - 1] : null;
                    $previousDone = !$previous || (!empty($progress[$previous->id]) && (($quizScores[$previous->id] ?? 0) >= $minimumQuizScore));
                    $locked = !$previousDone;
                    $latihanDone = !empty($progress[$module->id]);
                    $quizScore = $quizScores[$module->id] ?? null;
                    $done = $latihanDone && $quizScore !== null && $quizScore >= $minimumQuizScore;
                @endphp

                <div class="col-md-6 col-xl-4">
                    <div class="card-soft card-hover p-4 h-100">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="icon-box">
                                <i class="bi {{ $module->image ?: 'bi-cpu' }}"></i>
                            </div>

                            <div class="flex-grow-1">
                                <span class="badge {{ $done ? 'status-done' : ($locked ? 'status-lock' : 'status-open') }} mb-2">
                                    {{ $done ? 'Selesai' : ($locked ? 'Terkunci' : 'Terbuka') }}
                                </span>

                                <h5 class="fw-bold mb-2">{{ $module->title }}</h5>
                                <p class="small muted mb-2">{{ $module->summary }}</p>
                                <p class="small mb-0">
                                    Latihan: <b>{{ $latihanDone ? 'Selesai' : 'Belum' }}</b><br>
                                    Quiz: <b>{{ $quizScore === null ? 'Belum' : $quizScore }}</b>
                                </p>
                            </div>
                        </div>

                        <div class="mt-4">
                            @if($locked)
                                <button class="btn btn-soft btn-sm" disabled>
                                    <i class="bi bi-lock me-1"></i> Selesaikan materi sebelumnya
                                </button>
                            @else
                                <a href="{{ route('materi.show', $module) }}" class="btn btn-main btn-sm">
                                    <i class="bi bi-book me-1"></i> Pelajari Materi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection