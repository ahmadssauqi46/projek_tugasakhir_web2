@extends('layouts.app')

@section('title', $module->title)

@section('content')
<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <span class="chip mb-3">
                    <i class="bi bi-journal-text"></i>
                    Detail Materi
                </span>

                <h2 class="fw-bold mb-3">
                    {{ $module->title }}
                </h2>

                <div class="card-soft p-4 p-md-5 mb-4 material-content">
                    {!! $module->content !!}
                </div>

                <div class="exam-card">
                    <div class="exam-header">
                        <h4 class="fw-bold mb-1">
                            Latihan Sub Bab
                        </h4>

                        <p class="small muted mb-0">
                            Hasil benar atau salah langsung tampil. Nilai latihan tidak disimpan ke database.
                        </p>
                    </div>

                    <div class="exam-body">
                        @if (session('latihan_result'))
                            @php
                                $r = session('latihan_result');
                            @endphp

                            <div class="alert alert-info">
                                <b>Hasil Latihan:</b>
                                Benar {{ $r['correct'] }} dari {{ session('total') }} soal.
                                Nilai {{ $r['score'] }}.

                                @if ($r['correct'] >= 3)
                                    Materi berikutnya sudah terbuka.
                                @else
                                    Ulangi latihan agar lebih memahami materi.
                                @endif
                            </div>
                        @endif

                        <form method="POST" action="{{ route('latihan.submit', $module) }}">
                            @csrf

                            @foreach ($questions as $q)
                                <div class="question-box">
                                    <div class="question-number">
                                        Soal Nomor {{ $loop->iteration }}
                                    </div>

                                    <p class="question-text">
                                        {{ $q->question }}
                                    </p>

                                    @foreach (['A' => 'option_a', 'B' => 'option_b', 'C' => 'option_c', 'D' => 'option_d'] as $key => $field)
                                        <label class="question-option">
                                            <input
                                                type="radio"
                                                name="answers[{{ $q->id }}]"
                                                value="{{ $key }}"
                                                required>

                                            <span>
                                                <b>{{ $key }}.</b> {{ $q->$field }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            @endforeach

                            <button class="btn btn-main px-4">
                                Periksa Latihan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-soft p-4 sticky-top" style="top: 100px;">
                    <div class="device-box mb-4">
                        <i class="bi {{ $module->image ?: 'bi-cpu' }}"></i>
                    </div>

                    <h5 class="fw-bold">
                        Aksi Pembelajaran
                    </h5>

                    <p class="small muted">
                        Setelah membaca materi dan mengerjakan latihan, lanjutkan ke modul berikutnya. Jika sudah sampai modul terakhir, lanjutkan ke simulasi sebelum mengerjakan kuis.
                    </p>

                    @if (isset($nextModule) && $nextModule)
                        <a href="{{ route('materi.show', $nextModule->slug) }}" class="btn btn-next-module w-100 mb-2">
                            Lanjut ke Modul Berikutnya
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @else
                        <a href="{{ route('simulasi.interaktif') }}" class="btn btn-next-module w-100 mb-2">
                            Lanjut ke Simulasi
                            <i class="bi bi-controller ms-1"></i>
                        </a>
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