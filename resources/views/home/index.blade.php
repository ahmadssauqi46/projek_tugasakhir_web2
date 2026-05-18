<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            overflow-x: hidden;
            background: #f5f7ff;
        }
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 30px;
            font-weight: 700;
            color: #4f46e5 !important;
        }
        .nav-link {
            color: #333 !important;
            margin-left: 20px;
            font-weight: 500;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #4f46e5 !important;
        }
        .btn-login {
            background: #4f46e5;
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            margin-left: 20px;
            font-weight: 500;
        }
        .btn-login:hover {
            background: #4338ca;
            color: white;
        }
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
            padding-top: 80px;
        }
        .hero h1 {
            font-size: 64px;
            font-weight: 700;
            line-height: 1.2;
        }
        .hero p {
            margin-top: 20px;
            font-size: 18px;
            color: rgba(255,255,255,0.9);
        }
        .btn-start {
            margin-top: 30px;
            padding: 15px 35px;
            border-radius: 50px;
            border: none;
            background: white;
            color: #3730a3;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }
        .btn-start:hover {
            transform: translateY(-5px);
            background: #151153; 
            color: white; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
        }
        .hero img {
            width: 100%;
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        .section-padding {
            padding: 100px 0;
        }
        .title {
            text-align: center;
            margin-bottom: 60px;
        }
        .title h2 {
            font-weight: 700;
        }
        .feature-card, .materi-card, .stats-card, .testi-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }
        .feature-card:hover, .materi-card:hover {
            transform: translateY(-10px);
        }
        .feature-card {
            text-align: center;
        }
        .icon {
            width: 80px;
            height: 80px;
            background: #eef2ff;
            margin: auto;
            margin-bottom: 25px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
        }
        .materi-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .badge-hw { background: #eef2ff; color: #4f46e5; }
        .badge-sw { background: #fef3c7; color: #d97706; }
        .badge-net { background: #dcfce7; color: #16a34a; }
        .btn-belajar {
            background: #4f46e5;
            color: white;
            border-radius: 10px;
            width: 100%;
            font-weight: 500;
            transition: 0.3s;
        }
        .btn-belajar:hover {
            background: #3730a3;
            color: white;
        }
        .stats-section {
            background: #4f46e5;
            color: white;
        }
        .stats-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            text-align: center;
        }
        .stats-card h3 {
            font-size: 45px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .about {
            background: white;
        }
        .about img {
            width: 100%;
        }
        .about h2 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #eef2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 15px;
        }
        .accordion-item {
            border: none;
            margin-bottom: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03);
            border-radius: 15px !important;
            overflow: hidden;
        }
        .accordion-button:not(.collapsed) {
            background-color: #eef2ff;
            color: #4f46e5;
        }
        .accordion-button:focus {
            box-shadow: none;
        }
        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px;
        }
        @media(max-width:991px) {
            .hero {
                text-align: center;
                padding: 130px 0 80px;
            }
            .hero h1 {
                font-size: 42px;
            }
            .hero img {
                margin-top: 50px;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">EduGame</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/materi') }}">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/quiz') }}">Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-login" href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Belajar Komputer Jadi Lebih Interaktif</h1>
                    <p>Platform pembelajaran modern berbasis web dengan quiz interaktif dan tracking skor secara real-time.</p>
                    <a href="{{ url('/materi') }}" class="btn btn-start d-inline-flex align-items-center justify-content-center text-decoration-none">Mulai Belajar</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    <section class="feature section-padding">
        <div class="container">
            <div class="title">
                <h2>Fitur Unggulan</h2>
                <p>Sistem pembelajaran modern untuk siswa</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon">📚</div>
                        <h4>Materi Interaktif</h4>
                        <p>Belajar materi komputer dengan tampilan modern dan mudah dipahami.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon">🧠</div>
                        <h4>Quiz Interaktif</h4>
                        <p>Quiz menarik dengan konsep gamification minimalis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon">📈</div>
                        <h4>Real-Time Score</h4>
                        <p>Tracking skor dan progress belajar secara langsung.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="materi-pilihan section-padding bg-light border-top border-bottom">
        <div class="container">
            <div class="title">
                <h2>Pilihan Modul Pembelajaran</h2>
                <p>Pilih topik yang ingin kamu kuasai</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="materi-card">
                        <span class="materi-badge badge-hw">Modul 01</span>
                        <h4>Hardware Komputer</h4>
                        <p class="text-muted">Pelajari arsitektur fisik, unit pemrosesan inti (CPU), media penyimpanan, dan perangkat periferal.</p>
                        <a href="{{ url('/materi/hardware') }}" class="btn btn-belajar py-2.5 mt-3 text-decoration-none">Pelajari Materi</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="materi-card">
                        <span class="materi-badge badge-sw">Modul 02</span>
                        <h4>Software Komputer</h4>
                        <p class="text-muted">Pahami sistem operasi kernel, manajemen memori, aplikasi, utilitas, hingga jenis ancaman malware.</p>
                        <a href="{{ url('/materi/software') }}" class="btn btn-belajar py-2.5 mt-3 text-decoration-none">Pelajari Materi</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="materi-card">
                        <span class="materi-badge badge-net">Modul 03</span>
                        <h4>Jaringan Komputer</h4>
                        <p class="text-muted">Kuasai konsep transmisi data biner, topologi jaringan, model referensi OSI, dan pengalamatan IP.</p>
                        <a href="{{ url('/materi/jaringan') }}" class="btn btn-belajar py-2.5 mt-3 text-decoration-none">Pelajari Materi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-section section-padding">
    <div class="container">
        <div class="title text-center text-white">
            <h2 class="text-white">Statistik EduGame</h2>
            <p class="text-white-50">Perkembangan platform kami sejauh ini</p>
        </div>
        
        <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="stats-card">
                        <h3>{{ number_format($totalKunjungan) }}</h3>
                        <p class="mb-0 text-white-50">Total Kunjungan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="stats-card">
                        <h3>{{ $totalModul }}</h3>
                        <p class="mb-0 text-white-50">Modul Utama</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="stats-card">
                        <h3>{{ $totalSoal }}+</h3>
                        <p class="mb-0 text-white-50">Bank Soal Quiz</p>
                    </div>
                </div>

              <div class="col-lg-3 col-sm-6">
                 <div class="stats-card">
                        <h3>98%</h3>
                        <p class="mb-0 text-white-50">Tingkat Kepuasan</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="about section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" alt="About Image">
                </div>
                <div class="col-lg-6">
                    <h2>Tentang Website</h2>
                    <p>EduGame adalah media pembelajaran berbasis web yang membantu siswa belajar komputer dengan lebih menarik, modern, dan interaktif.</p>
                    <p>Website ini menggunakan pendekatan gamification dan tracking skor real-time untuk meningkatkan motivasi belajar siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section section-padding">
        <div class="container">
            <div class="title">
                <h2>Pertanyaan Umum (FAQ)</h2>
                <p>Punya pertanyaan? Cari jawabannya di bawah ini</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Apakah saya harus mendaftar akun untuk membaca materi?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tidak perlu. Semua materi (Hardware, Software, Jaringan) bisa kamu baca secara gratis tanpa perlu login atau mendaftar terlebih dahulu.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Bagaimana cara menyimpan skor hasil quiz saya?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Untuk melacak perkembangan belajar dan menyimpan riwayat skor kuis secara permanen ke dalam database, kamu disarankan untuk melakukan login terlebih dahulu melalui tombol yang tersedia di navigasi atas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah materi di web ini disesuaikan dengan kurikulum sekolah?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Ya, materi dasar komputer dan informatika yang ada di platform ini sudah disusun agar sejalan dengan standar materi dasar Kurikulum Merdeka atau K13 revisi untuk SMP/MTS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p class="mb-0">&copy; 2026 EduGame Learning</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>