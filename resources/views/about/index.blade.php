@extends('layouts.app')

@section('content')

<section class="hero text-center">
    <div class="container">

    <h1 class="fw-bold">
        Tentang EduTech Learning
    </h1>

    <p class="lead">
        Media pembelajaran komputer berbasis web yang dirancang
        untuk membantu siswa memahami konsep komputer dan jaringan
        secara interaktif, sistematis, dan terukur.
    </p>

</div>
</section>

<section class="section">
    <div class="container">
    <div class="row g-4 align-items-center">

        <div class="col-lg-5">
            <div class="illus">
                💻
            </div>
        </div>

        <div class="col-lg-7">

            <div class="card-soft p-5">

                <h2 class="fw-bold">
                    Profil Website
                </h2>

                <p>
                    EduTech Learning merupakan media pembelajaran
                    berbasis web yang dikembangkan untuk mendukung
                    proses belajar komputer dan jaringan secara
                    mandiri maupun di dalam kelas. Website ini
                    menyediakan materi pembelajaran, latihan,
                    quiz, dan evaluasi yang disusun secara bertahap
                    agar peserta didik dapat memahami materi dengan
                    lebih efektif.
                </p>

                <h5 class="fw-bold mt-4">
                    Tujuan Pengembangan
                </h5>

                <p>
                    Website ini dikembangkan untuk meningkatkan
                    minat belajar siswa melalui penggunaan teknologi
                    digital serta memberikan pengalaman belajar yang
                    lebih interaktif dibandingkan metode pembelajaran
                    konvensional.
                </p>

                <h5 class="fw-bold mt-4">
                    Fitur Pembelajaran
                </h5>

                <ul>
                    <li>Materi pembelajaran bertahap.</li>
                    <li>Latihan untuk mengukur pemahaman materi.</li>
                    <li>Quiz dengan penyimpanan nilai otomatis.</li>
                    <li>Evaluasi akhir pembelajaran.</li>
                    <li>Dashboard administrasi berbasis CRUD.</li>
                </ul>

                <h5 class="fw-bold mt-4">
                    Penerapan TPACK
                </h5>

                <p>
                    <strong>Technology Knowledge (TK)</strong>
                    diterapkan melalui penggunaan website,
                    database MySQL, dan teknologi Laravel.
                </p>

                <p>
                    <strong>Pedagogical Knowledge (PK)</strong>
                    diterapkan melalui penyusunan alur belajar
                    yang sistematis mulai dari materi, latihan,
                    quiz, hingga evaluasi.
                </p>

                <p>
                    <strong>Content Knowledge (CK)</strong>
                    diterapkan melalui penyajian materi mengenai
                    perangkat keras, perangkat lunak, dan jaringan
                    komputer.
                </p>

            </div>

        </div>

    </div>

    <div class="row g-4 mt-4">

        <div class="col-md-4">
            <div class="card-soft p-4 text-center">

                <h5 class="fw-bold">
                    Developer
                </h5>

                <p>
                    Ahmad Sauqi<br>
                    Muhammad Alfria Afdha<br>
                    Tegar Kurniawan
                </p>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-soft p-4 text-center">

                <h5 class="fw-bold">
                    Kontak
                </h5>

                <p>
                    edutechlearning@gmail.com
                </p>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-soft p-4 text-center">

                <h5 class="fw-bold">
                    Target Pengguna
                </h5>

                <p>
                    Siswa dan mahasiswa yang mempelajari dasar
                    komputer serta jaringan komputer.
                </p>
            </div>
        </div>
    </div>

</div>
</section>
@endsection
