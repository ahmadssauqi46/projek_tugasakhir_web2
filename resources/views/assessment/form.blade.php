@extends('layouts.app')

@section('title', $mode == 'quiz' ? 'Quiz Interaktif' : 'Evaluasi Akhir')

@section('content')
<section class="section">
    <div class="container">
        <div class="mb-4">
            <span class="chip mb-3">
                <i class="bi bi-patch-question"></i>
                {{ $mode == 'quiz' ? 'Quiz Interaktif' : 'Evaluasi Akhir' }}
            </span>

            <h2 class="fw-bold mb-1">
                {{ $mode == 'quiz' ? 'Quiz: ' . $module->title : 'Evaluasi Akhir' }}
            </h2>

            <p class="muted mb-0">
                Jawab semua soal dengan teliti sebelum menekan tombol kirim.
            </p>
        </div>

        <form method="POST" action="{{ $mode == 'quiz' ? route('quiz.submit', $module) : route('evaluasi.submit') }}">
            @csrf

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="exam-card">
                        <div class="exam-header">
                            <label class="fw-bold small mb-2">Nama Siswa</label>
                            <input
                                class="form-control"
                                name="student_name"
                                value="{{ session('user_name') }}"
                                placeholder="Masukkan nama"
                                required>
                        </div>

                        <div class="exam-body">
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
                        </div>
                        <div class="exam-footer">
                            <button class="btn btn-main px-4">
                                Kirim Jawaban
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="exam-side">
                        <div class="timer-box">
                            <small>Informasi</small>
                            <h4>{{ $questions->count() }} Soal</h4>
                        </div>
                        <h5 class="fw-bold mb-3">Aturan Pengerjaan</h5>

                        <p class="small muted">
                            {{ $mode == 'quiz'
                                ? 'Quiz hanya dapat dikerjakan satu kali. Nilai akan tampil dan tersimpan ke database.'
                                : 'Evaluasi akhir dikirim ke guru. Nilai tidak ditampilkan kepada siswa.' }}
                        </p>
                        <hr>
                        <p class="small muted mb-0">
                            Pastikan semua soal sudah dijawab sebelum mengirim jawaban.
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection