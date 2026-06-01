@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <span class="badge bg-white text-primary mb-3">
                    Media Pembelajaran Interaktif
                </span>

                <h1 class="display-4 fw-bold">
                    Belajar Komputer Lebih Terarah,
                    Interaktif, dan Terukur
                </h1>

                <p class="lead mt-3">
                    EduTech membantu siswa memahami hardware, software,
                    dan jaringan melalui materi, latihan langsung,
                    quiz satu kali, serta evaluasi akhir yang tersimpan
                    di database.
                </p>

                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="{{ route('materi.index') }}"
                        class="btn btn-light btn-lg rounded-pill fw-bold px-4">
                        Mulai Belajar
                    </a>

                    <a href="{{ route('quiz.index') }}"
                        class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4">
                        Lihat Quiz
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="illus">
                    📚
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Fitur Utama</h2>
            <p class="text-muted">
                Dirancang sesuai alur media pembelajaran umum
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card-soft p-4 h-100">
                    <div class="mini-icon">🧩</div>

                    <h5 class="fw-bold mt-3">
                        Materi Bertahap
                    </h5>

                    <p>
                        Modul berikutnya hanya dapat dibuka jika
                        latihan modul sebelumnya telah diselesaikan.
                    </p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 text-center">
                    <div class="mini-icon mx-auto">✅</div>

                    <h5 class="fw-bold mt-3">
                        Latihan
                    </h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 text-center">
                    <div class="mini-icon mx-auto">📝</div>

                    <h5 class="fw-bold mt-3">
                        Quiz
                    </h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100">
                    <div class="mini-icon">🔒</div>

                    <h5 class="fw-bold mt-3">
                        Evaluasi
                    </h5>

                    <p>
                        Nilai evaluasi tidak ditampilkan kepada siswa,
                        namun tetap tersimpan pada database.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-white">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Modul Pembelajaran
            </h2>
        </div>

        <div class="row g-4">

            @foreach($modules as $m)
                <div class="col-md-4">

                    <div class="card-soft p-4 h-100">

                        <div class="display-4">
                            {{ $m->image }}
                        </div>

                        <span class="badge-step">
                            Modul {{ $m->order }}
                        </span>

                        <h4 class="fw-bold mt-3">
                            {{ $m->title }}
                        </h4>

                        <p class="text-muted">
                            {{ $m->summary }}
                        </p>

                        <a href="{{ route('materi.show', $m) }}"
                            class="btn btn-main w-100">
                            Pelajari Materi
                        </a>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row g-4 text-center">

            <div class="col-md-3">
                <h2 class="fw-bold">{{ $totalKunjungan }}</h2>
                <p>Kunjungan</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">{{ $totalModul }}</h2>
                <p>Modul</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">{{ $totalSoal }}</h2>
                <p>Bank Soal</p>
            </div>

            <div class="col-md-3">
                <h2 class="fw-bold">{{ $totalHasil }}</h2>
                <p>Hasil Tersimpan</p>
            </div>

        </div>

    </div>
</section>
@endsection