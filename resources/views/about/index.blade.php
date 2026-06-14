@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3"><i class="bi bi-info-circle"></i> Tentang Website</span>
            <h2 class="fw-bold mb-2">About EduTech Learning</h2>
            <p class="muted mb-0">Informasi singkat mengenai tujuan, pengguna, fitur, dan dasar pengembangan media pembelajaran.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="card-soft illus-card computer-svg h-100">
                    <svg viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="28" y="34" width="94" height="58" rx="12" stroke="currentColor" stroke-width="7"/>
                        <path d="M58 117h34M75 92v25" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
                        <path d="M50 55h50M50 72h35" stroke="#06b6d4" stroke-width="7" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-soft p-4 p-md-5 h-100">
                    <h5 class="fw-bold text-primary">Profil Website</h5>
                    <p>EduTech Learning adalah media pembelajaran berbasis web untuk siswa SMA kelas 10â€“11 yang berfokus pada pengenalan dasar komputer, khususnya hardware dan software.</p>

                    <h5 class="fw-bold text-primary mt-4">Tujuan Pengembangan</h5>
                    <p>Website ini dikembangkan untuk membantu siswa belajar secara bertahap, interaktif, dan terukur melalui materi, latihan, quiz, evaluasi, serta progress belajar.</p>

                    <h5 class="fw-bold text-primary mt-4">Target Pengguna</h5>
                    <p>Target pengguna adalah siswa SMA kelas 10â€“11 dan guru yang membutuhkan media pembelajaran sederhana, rapi, dan mudah digunakan.</p>

                    <h5 class="fw-bold text-primary mt-4">Fitur Media Pembelajaran</h5>
                    <p>Fitur utama meliputi materi 7 sub bab, detail materi, latihan, quiz, evaluasi, dashboard siswa, dan dashboard admin/guru.</p>

                    <h5 class="fw-bold text-primary mt-4">Fitur Gamification</h5>
                    <p>Gamification diterapkan melalui progress bar, poin, badge, status materi selesai/terkunci, serta leaderboard untuk meningkatkan motivasi belajar.</p>

                    <h5 class="fw-bold text-primary mt-4">Kontak Keluhan</h5>
                    <p class="mb-0">Jika mengalami kendala saat menggunakan website, silakan hubungi kontak keluhan melalui WhatsApp: <a class="fw-bold text-decoration-none" href="https://wa.me/6282154030108" target="_blank" rel="noopener">082154030108</a>.</p>
                    <h5 class="fw-bold text-primary mt-4">Daftar Pustaka</h5>
                    <ul class="mb-0 ps-3">
                        <li>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi. (2021). Informatika untuk SMA Kelas X.</li>
                        <li>Stallings, W. (2021). Computer Organization and Architecture.</li>
                        <li>Silberschatz, A., Galvin, P. B., & Gagne, G. (2020). Operating System Concepts.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

