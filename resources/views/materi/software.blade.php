<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Software Komputer Lengkap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f5f7ff; 
        }
        .navbar { 
            background: #4f46e5; 
        }
        .navbar-brand, .nav-link { 
            color: white !important; 
        }
        .header-materi { 
            padding: 100px 0 40px; 
            background: linear-gradient(135deg,#4f46e5,#7c3aed); 
            color: white; 
            text-align: center; 
        }
        .content-card { 
            background: white; 
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.05); 
            margin-top: -30px; 
        }
        .badge-kategori { 
            background: #fef3c7; 
            color: #d97706; 
            font-weight: 600; 
            padding: 8px 16px; 
            border-radius: 30px; 
            display: inline-block; 
            margin-bottom: 15px; 
        }
        .component-box { 
            background: #f8fafc; 
            border-left: 4px solid #7c3aed; 
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 0 10px 10px 0; 
        }
        .btn-custom-quiz { 
            background: #7c3aed; 
            color: white; 
            border: none; 
        }
        .btn-custom-quiz:hover { 
            background: #6d28d9; 
            color: white; 
        }
        .btn-custom-next { 
            background: #4f46e5; 
            color: white; 
            border: none; 
        }
        .btn-custom-next:hover { 
            background: #3730a3; 
            color: white; 
        }
        .fade-content { 
            transition: opacity 0.3s ease-in-out; 
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">EduGame</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link active" href="/materi">Materi</a>
                <a class="nav-link" href="/about">About</a>
            </div>
        </div>
    </nav>

    <section class="header-materi">
        <div class="container">
            <h1>Software Komputer</h1>
            <p>Sistem Abstraksi Logika, Manajemen Kernel, Lapisan Aplikasi, dan Optimasi Perangkat Lunak</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card fade-content" id="software-material-box">
                        
                        <div id="page-1">
                            <span class="badge-kategori">Modul 02 - Bagian 1: Arsitektur Sistem Operasi</span>
                            <h2>Pengantar Perangkat Lunak & Sistem Operasi</h2>
                            <p class="text-muted">Software adalah representasi instruksi logis berupa kode-kode bahasa pemrograman yang dikompilasi menjadi instruksi mesin tingkat rendah agar dieksekusi oleh hardware komputer.</p>
                            
                            <h4 class="mt-4 mb-3">Struktur Arsitektur Sistem Operasi (OS):</h4>
                            
                            <div class="component-box">
                                <h5>1. Kernel (Inti Sistem Operasi)</h5>
                                <p class="mb-2">Kernel adalah program inti komputer yang berjalan pada level paling dasar (ring 0) dengan hak akses penuh ke hardware. Tugas utama kernel meliputi:</p>
                                <ul>
                                    <li><strong>Manajemen Proses:</strong> Mengatur penjadwalan eksekusi tugas di CPU (Threading dan Multitasking).</li>
                                    <li><strong>Manajemen Memori:</strong> Mengalokasikan ruang alamat memori RAM virtual untuk aplikasi dan mencegah tumpang tindih instruksi data.</li>
                                    <li><strong>Device Drivers:</strong> Berfungsi sebagai penerjemah spesifik standar komunikasi antara OS dan perangkat keras pabrikan luar.</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>2. Lapisan Aplikasi (Application Layer) & Interpreter</h5>
                                <p class="mb-2">Aplikasi berjalan pada level pengguna (user mode) terisolasi untuk menjaga kestabilan sistem. Aplikasi memanfaatkan **API (Application Programming Interface)** bawaan OS untuk meminta akses sumber daya periferal:</p>
                                <ul>
                                    <li><strong>Software Desktop/Mobile:</strong> Suite Produktivitas (Office), Database Management System (DBMS), Editor Media Grafis.</li>
                                    <li><strong>Web Browser Modern:</strong> Memanfaatkan mesin rendering kompleks (seperti V8 Engine) untuk memproses arsitektur web dinamis (HTML5, JavaScript) langsung di sisi klien.</li>
                                </ul>
                            </div>
                        </div>

                        <div id="page-2" class="d-none">
                            <span class="badge-kategori">Modul 02 - Bagian 2: Utilitas Sistem, Lisensi & Ancaman Keamanan</span>
                            <h2>Sistem Utilitas Keamanan dan Siklus Distribusi</h2>
                            <p class="text-muted">Manajemen pemeliharaan integritas file, penataan memori, serta proteksi terhadap ancaman eksternal mutlak diperlukan untuk menjaga keandalan sistem operasi komputer.</p>
                            
                            <h4 class="mt-4 mb-3">Sistem Proteksi, Utilitas, dan Regulasi Kode:</h4>

                            <div class="component-box">
                                <h5>3. Software Utilitas Tingkat Lanjut</h5>
                                <p class="mb-2">Berfungsi melakukan tugas optimasi sistem sekunder:</p>
                                <ul>
                                    <li><strong>File System Tools:</strong> Pengelola partisi data (NTFS, ext4), perangkat defragmentasi piringan magnetik, serta kompresi algoritma lossless (ZIP/RAR).</li>
                                    <li><strong>Antivirus Engine:</strong> Menggunakan pencocokan *signature* berbasis database dan analisis heuristik perilaku program secara *real-time* untuk mendeteksi anomali pada memori.</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>4. Ancaman Keamanan Siber (Malware Classifications)</h5>
                                <p class="mb-0">Malware dirancang untuk merusak fungsionalitas sistem atau eksploitasi data privasi. Jenisnya meliputi **Virus** (mereplikasi diri dengan menempel pada file inang), **Trojan** (malware menyamar sebagai program legal), **Spyware** (merekam aktivitas log keyboard secara ilegal), dan **Ransomware** (mengenkripsi sistem file korban menggunakan algoritma enkripsi asimetris kuat untuk meminta tebusan kunci dekripsi).</p>
                            </div>

                            <div class="component-box">
                                <h5>5. Klasifikasi Model Lisensi Distribusi</h5>
                                <p class="mb-0">Perangkat lunak diatur oleh hukum hak cipta distribusi kode: **Proprietary Software** (kode tertutup komersial), **Open Source** (kode terbuka bebas dimodifikasi dan didistribusikan seperti lisensi GPL), **Freeware** (gratis tanpa hak akses kode), dan **Shareware** (evaluasi gratis terbatas masa trial).</p>
                            </div>
                        </div>

                        <div class="row g-2 mt-5 pt-3 border-top">
                            <div class="col-md-4 text-start">
                                <a href="/materi" class="btn btn-outline-secondary w-100 py-2 fw-medium" id="back-btn" style="border-radius: 10px;">
                                    &larr; Kembali ke Materi
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="/quiz/software" class="btn btn-custom-quiz w-100 py-2 fw-medium" style="border-radius: 10px;">
                                    🎮 Uji Kemampuan (Quiz)
                                </a>
                            </div>
                            <div class="col-md-4 text-end">
                                <button type="button" class="btn btn-custom-next w-100 py-2 fw-medium" id="next-materi-btn" style="border-radius: 10px;">
                                    Materi Selanjutnya &rarr;
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentPage = 1;
        const page1 = document.getElementById('page-1');
        const page2 = document.getElementById('page-2');
        const backBtn = document.getElementById('back-btn');
        const nextMateriBtn = document.getElementById('next-materi-btn');

        nextMateriBtn.addEventListener('click', function() {
            if (currentPage === 1) {
                page1.classList.add('d-none');
                page2.classList.remove('d-none');
                backBtn.innerHTML = "&larr; Halaman Sebelumnya";
                backBtn.removeAttribute('href');
                nextMateriBtn.innerHTML = "Materi Jaringan &rarr;";
                currentPage = 2;
            } else if (currentPage === 2) {
                window.location.href = "/materi/jaringan";
            }
        });

        backBtn.addEventListener('click', function(e) {
            if (currentPage === 2) {
                e.preventDefault();
                page2.classList.add('d-none');
                page1.classList.remove('d-none');
                backBtn.innerHTML = "&larr; Kembali ke Materi";
                backBtn.setAttribute('href', '/materi');
                nextMateriBtn.innerHTML = "Materi Selanjutnya &rarr;";
                currentPage = 1;
            }
        });
    </script>

</body>
</html>