@extends('layouts.app')

@section('content')

<section class="hero text-center text-lg-start py-5" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
    <div class="container py-5">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill shadow-sm fw-bold">
                    Media Pembelajaran Interaktif
                </span>

                <h1 class="display-4 fw-extrabold text-white mb-3" style="line-height: 1.2;">
                    Belajar Komputer Lebih Terarah, Interaktif, dan Terukur
                </h1>

                <p class="lead text-white-50 mt-3" style="line-height: 1.8;">
                    EduTech membantu siswa memahami hardware, software,
                    dan jaringan melalui materi, latihan langsung,
                    quiz satu kali, serta evaluasi akhir yang tersimpan
                    di database.
                </p>

                <div class="d-flex gap-3 mt-4 flex-wrap justify-content-center justify-content-lg-start">
                    <a href="{{ route('materi.index') }}"
                        class="btn btn-white text-primary btn-lg rounded-pill fw-bold px-4 shadow">
                        Mulai Belajar
                    </a>

                    <a href="{{ route('quiz.index') }}"
                        class="btn btn-outline-light btn-lg rounded-pill fw-bold px-4">
                        Lihat Quiz
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <div class="illus-wrapper">
                    <div class="illus-icon" style="font-size: 8rem; animation: floatAnim 4s ease-in-out infinite;">
                        📚
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section py-5 bg-light">
    <div class="container py-4">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Fitur Utama</h2>
            <p class="text-muted mx-auto" style="max-width: 500px;">
                Dirancang sesuai alur media pembelajaran umum
            </p>
        </div>

        <div class="row g-4 align-items-stretch">

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 shadow-sm border-0 rounded-4 bg-white d-flex flex-column justify-content-between custom-card-hover">
                    <div>
                        <div class="mini-icon fs-2 bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 50px; height: 50px;">🧩</div>
                        <h5 class="fw-bold text-dark">Materi Bertahap</h5>
                        <p class="text-secondary small mb-0 lh-base">
                            Modul berikutnya hanya dapat dibuka jika latihan modul sebelumnya telah diselesaikan.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 text-center shadow-sm border-0 rounded-4 bg-white d-flex flex-column justify-content-between custom-card-hover">
                    <div class="my-auto py-3">
                        <div class="mini-icon fs-2 bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center rounded-3 mx-auto mb-3" style="width: 50px; height: 50px;">✅</div>
                        <h5 class="fw-bold text-dark mb-0">Latihan</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 text-center shadow-sm border-0 rounded-4 bg-white d-flex flex-column justify-content-between custom-card-hover">
                    <div class="my-auto py-3">
                        <div class="mini-icon fs-2 bg-info bg-opacity-10 text-info d-flex align-items-center justify-content-center rounded-3 mx-auto mb-3" style="width: 50px; height: 50px;">📝</div>
                        <h5 class="fw-bold text-dark mb-0">Quiz</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-soft p-4 h-100 shadow-sm border-0 rounded-4 bg-white d-flex flex-column justify-content-between custom-card-hover">
                    <div>
                        <div class="mini-icon fs-2 bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 50px; height: 50px;">🔒</div>
                        <h5 class="fw-bold text-dark">Evaluasi</h5>
                        <p class="text-secondary small mb-0 lh-base">
                            Nilai evaluasi tidak ditampilkan kepada siswa, namun tetap tersimpan pada database.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="section bg-white py-5">
    <div class="container py-4">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Modul Pembelajaran</h2>
        </div>

        <div class="row g-4 align-items-stretch">

            @foreach($modules as $m)
                <div class="col-md-4">
                    <div class="card-soft p-4 h-100 shadow-sm border-0 rounded-4 bg-light d-flex flex-column justify-content-between custom-card-hover">
                        <div>
                            <div class="display-4 mb-2">
                                {{ $m->image }}
                            </div>

                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1.5 rounded-pill small fw-semibold">
                                Modul {{ $m->order }}
                            </span>

                            <h4 class="fw-bold text-dark mt-3 mb-2">
                                {{ $m->title }}
                            </h4>

                            <p class="text-muted small mb-4 lh-base">
                                {{ $m->summary }}
                            </p>
                        </div>

                        <a href="{{ route('materi.show', $m) }}"
                            class="btn btn-primary w-100 rounded-3 py-2 fw-semibold">
                            Pelajari Materi
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

<section class="section py-5 text-white" style="background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);">
    <div class="container py-3">
        <div class="row g-4 text-center">

            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-5 fw-extrabold mb-1">{{ $totalKunjungan }}</h2>
                    <p class="text-white-50 mb-0 small uppercase tracking-wider">Kunjungan</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-5 fw-extrabold mb-1">{{ $totalModul }}</h2>
                    <p class="text-white-50 mb-0 small uppercase tracking-wider">Modul</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-5 fw-extrabold mb-1">{{ $totalSoal }}</h2>
                    <p class="text-white-50 mb-0 small uppercase tracking-wider">Bank Soal</p>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-5 fw-extrabold mb-1">{{ $totalHasil }}</h2>
                    <p class="text-white-50 mb-0 small uppercase tracking-wider">Hasil Tersimpan</p>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .fw-extrabold { font-weight: 800; }
    
    .btn-white {
        background-color: #ffffff;
        color: #4f46e5 !important;
        border: 1px solid #ffffff;
    }
    .btn-white:hover {
        background-color: #f8f9fa;
        color: #7c3aed !important;
    }

    @keyframes floatAnim {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }

    .custom-card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
</style>

@endsection