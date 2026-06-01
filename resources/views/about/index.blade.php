@extends('layouts.app')

@section('content')

<section class="hero text-center py-5" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
    <div class="container py-4">
        <h1 class="fw-extrabold display-4 text-white mb-3">
            Tentang EduTech Learning
        </h1>
        <p class="lead text-white-50 mx-auto" style="max-width: 750px; line-height: 1.8;">
            Media pembelajaran komputer berbasis web yang dirancang
            untuk membantu siswa memahami konsep komputer dan jaringan
            secara interaktif, sistematis, dan terukur.
        </p>
    </div>
</section>

<section class="section pb-5">
    <div class="container">
        <div class="row g-4 align-items-stretch">

            <div class="col-lg-5 d-flex flex-column justify-content-between">
                <div class="card-soft p-5 text-center shadow-sm border-0 rounded-4 bg-white d-flex align-items-center justify-content-center h-100" style="min-height: 300px;">
                    <div class="illus-wrapper">
                        <div class="illus-icon" style="font-size: 7rem; animation: floatAnim 4s ease-in-out infinite;">
                            💻
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card-soft p-5 shadow-sm border-0 rounded-4 bg-white h-100">
                    
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark d-flex align-items-center gap-2 mb-3" style="font-size: 1.75rem;">
                            <span class="fs-4 text-primary bg-primary bg-opacity-10 px-3 py-2 rounded-3">💡</span> Profil Website
                        </h2>
                        <p class="text-secondary" style="line-height: 1.7; text-align: justify;">
                            EduTech Learning merupakan media pembelajaran
                            berbasis web yang dikembangkan untuk mendukung
                            proses belajar komputer dan jaringan secara
                            mandiri maupun di dalam kelas. Website ini
                            menyediakan materi pembelajaran, latihan,
                            quiz, dan evaluasi yang disusun secara bertahap
                            agar peserta didik dapat memahami materi dengan
                            lebih efektif.
                        </p>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="mb-4">
                        <h5 class="fw-bold text-dark d-flex align-items-center gap-2 mb-3">
                            <span class="fs-5 text-success bg-success bg-opacity-10 px-2 py-1 rounded-2">🎯</span> Tujuan Pengembangan
                        </h5>
                        <p class="text-secondary" style="line-height: 1.7; text-align: justify;">
                            Website ini dikembangkan untuk meningkatkan
                            minat belajar siswa melalui penggunaan teknologi
                            digital serta memberikan pengalaman belajar yang
                            lebih interaktif dibandingkan metode pembelajaran
                            konvensional.
                        </p>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="mb-4">
                        <h5 class="fw-bold text-dark d-flex align-items-center gap-2 mb-3">
                            <span class="fs-5 text-info bg-info bg-opacity-10 px-2 py-1 rounded-2">✨</span> Fitur Pembelajaran
                        </h5>
                        <ul class="list-unstyled d-flex flex-column gap-2 ps-1">
                            <li class="d-flex align-items-start gap-2 text-secondary">
                                <span class="text-info mt-1">✔</span> <span>Materi pembelajaran bertahap.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 text-secondary">
                                <span class="text-info mt-1">✔</span> <span>Latihan untuk mengukur pemahaman materi.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 text-secondary">
                                <span class="text-info mt-1">✔</span> <span>Quiz dengan penyimpanan nilai otomatis.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 text-secondary">
                                <span class="text-info mt-1">✔</span> <span>Evaluasi akhir pembelajaran.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 text-secondary">
                                <span class="text-info mt-1">✔</span> <span>Dashboard administrasi berbasis CRUD.</span>
                            </li>
                        </ul>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div>
                        <h5 class="fw-bold text-dark d-flex align-items-center gap-2 mb-3">
                            <span class="fs-5 text-warning bg-warning bg-opacity-10 px-2 py-1 rounded-2">⚙</span> Penerapan TPACK
                        </h5>
                        <div class="d-flex flex-column gap-3">
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-danger">
                                <p class="mb-0 text-secondary">
                                    <strong class="text-danger">Technology Knowledge (TK)</strong>
                                    diterapkan melalui penggunaan website, database MySQL, dan teknologi Laravel.
                                </p>
                            </div>
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-primary">
                                <p class="mb-0 text-secondary">
                                    <strong class="text-primary">Pedagogical Knowledge (PK)</strong>
                                    diterapkan melalui penyusunan alur belajar yang sistematis mulai dari materi, latihan, quiz, hingga evaluasi.
                                </p>
                            </div>
                            <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
                                <p class="mb-0 text-secondary">
                                    <strong class="text-success">Content Knowledge (CK)</strong>
                                    diterapkan melalui penyajian materi mengenai Jaringan komputer.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            
            <div class="col-md-4">
                <div class="card-soft p-4 text-center h-100 shadow-sm border-0 rounded-4 bg-white custom-card-hover">
                    <div class="icon-box mb-3 mx-auto d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle" style="width: 55px; height: 55px;">
                        <span class="fs-4">👥</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Developer</h5>
                    <p class="text-secondary mb-0 lh-lg">
                        Ahmad Sauqi<br>
                        Muhammad Alfria Afdha<br>
                        Tegar Kurniawan
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-soft p-4 text-center h-100 shadow-sm border-0 rounded-4 bg-white custom-card-hover">
                    <div class="icon-box mb-3 mx-auto d-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle" style="width: 55px; height: 55px;">
                        <span class="fs-4">✉️</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Kontak</h5>
                    <p class="text-secondary mb-0">
                        <a href="mailto:edutechlearning@gmail.com" class="text-decoration-none text-secondary hover-link">
                            edutechlearning@gmail.com
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-soft p-4 text-center h-100 shadow-sm border-0 rounded-4 bg-white custom-card-hover">
                    <div class="icon-box mb-3 mx-auto d-flex align-items-center justify-content-center bg-warning bg-opacity-10 text-warning rounded-circle" style="width: 55px; height: 55px;">
                        <span class="fs-4">🎯</span>
                    </div>
                    <h5 class="fw-bold text-dark mb-3">Target Pengguna</h5>
                    <p class="text-secondary mb-0 lh-base">
                        Siswa dan mahasiswa yang mempelajari dasar komputer serta jaringan komputer.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .fw-extrabold { font-weight: 800; }
    
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

    .hover-link:hover {
        color: #0d6efd !important;
        text-decoration: underline !important;
    }
</style>

@endsection