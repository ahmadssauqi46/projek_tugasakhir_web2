<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Software Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f5f7ff; }
        .navbar { background: #4f46e5; }
        .navbar-brand, .nav-link { color: white !important; }
        .header-materi { padding: 100px 0 40px; background: linear-gradient(135deg,#4f46e5,#7c3aed); color: white; text-align: center; }
        .content-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-top: -30px; }
        .badge-kategori { background: #fef3c7; color: #d97706; font-weight: 600; padding: 8px 16px; border-radius: 30px; display: inline-block; margin-bottom: 15px; }
        .component-box { background: #f8fafc; border-left: 4px solid #7c3aed; padding: 15px; margin-bottom: 15px; border-radius: 0 10px 10px 0; }
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
            <p>Mengenal Program, Sistem Operasi, dan Aplikasi Komputer</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card">
                        <span class="badge-kategori">Modul 02</span>
                        <h2>Apa itu Software?</h2>
                        <p class="text-muted">Software (perangkat lunak) adalah kumpulan instruksi, data, atau program yang digunakan untuk mengoperasikan komputer dan menjalankan tugas-tugas tertentu. Berbeda dengan hardware, software tidak memiliki wujud fisik.</p>
                        
                        <h4 class="mt-4 mb-3">Pembagian Jenis Software:</h4>
                        
                        <div class="component-box">
                            <h5>1. Sistem Operasi (Operating System / OS)</h5>
                            <p class="mb-0">Software paling utama yang berfungsi mengelola hardware dan menjembatani interaksi antara pengguna dan komputer. <br><em>Contoh: Windows, macOS, Linux, Android.</em></p>
                        </div>

                        <div class="component-box">
                            <h5>2. Software Aplikasi (Application Software)</h5>
                            <p class="mb-0">Program yang dibuat spesifik untuk membantu pengguna menyelesaikan pekerjaan tertentu. <br><em>Contoh: Microsoft Word (Ketik), Google Chrome (Browser), Photoshop (Desain).</em></p>
                        </div>

                        <div class="component-box">
                            <h5>3. Software Utilitas (Utility Software)</h5>
                            <p class="mb-0">Software yang berfungsi untuk membantu menjaga, menganalisis, dan mengonfigurasi kinerja komputer agar tetap aman dan stabil. <br><em>Contoh: Antivirus, Disk Defragmenter, WinRAR.</em></p>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="/materi" class="btn btn-outline-secondary">Kembali ke Materi</a>
                            <a href="/quiz" class="btn btn-primary" style="background: #4f46e5;">Uji Kemampuan (Quiz)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>