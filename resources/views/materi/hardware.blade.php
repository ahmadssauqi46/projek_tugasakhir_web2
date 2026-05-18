<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Hardware Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f5f7ff; }
        .navbar { background: #4f46e5; }
        .navbar-brand, .nav-link { color: white !important; }
        .header-materi { padding: 100px 0 40px; background: linear-gradient(135deg,#4f46e5,#7c3aed); color: white; text-align: center; }
        .content-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-top: -30px; }
        .badge-kategori { background: #eef2ff; color: #4f46e5; font-weight: 600; padding: 8px 16px; border-radius: 30px; display: inline-block; margin-bottom: 15px; }
        .component-box { background: #f8fafc; border-left: 4px solid #4f46e5; padding: 15px; margin-bottom: 15px; border-radius: 0 10px 10px 0; }
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
            <h1>Hardware Komputer</h1>
            <p>Mengenal Komponen Fisik yang Menggerakkan Sistem Komputer</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card">
                        <span class="badge-kategori">Modul 01</span>
                        <h2>Apa itu Hardware?</h2>
                        <p class="text-muted">Hardware (perangkat keras) adalah seluruh bagian fisik dari komputer yang dapat dilihat, disentuh, dan berbentuk nyata. Hardware bekerja sama dengan software untuk menjalankan instruksi pengguna.</p>
                        
                        <h4 class="mt-4 mb-3">Komponen Utama Hardware:</h4>
                        
                        <div class="component-box">
                            <h5>1. Central Processing Unit (CPU)</h5>
                            <p class="mb-0">Sering disebut sebagai "otak" komputer. CPU bertanggung jawab untuk mengolah data, menerima instruksi, dan mengendalikan semua perangkat lain.</p>
                        </div>

                        <div class="component-box">
                            <h5>2. Random Access Memory (RAM)</h5>
                            <p class="mb-0">Tempat penyimpanan data sementara yang sedang digunakan oleh komputer. Semakin besar RAM, semakin banyak aplikasi yang bisa dibuka bersamaan (multitasking).</p>
                        </div>

                        <div class="component-box">
                            <h5>3. Storage (SSD / HDD)</h5>
                            <p class="mb-0">Media penyimpanan permanen untuk sistem operasi, file pribadi, dan aplikasi anda. SSD memiliki kecepatan baca/tulis yang jauh lebih cepat dibanding HDD konvensional.</p>
                        </div>

                        <div class="component-box">
                            <h5>4. Perangkat Input & Output (I/O)</h5>
                            <p class="mb-0"><strong>Input:</strong> Perangkat untuk memasukkan data (Keyboard, Mouse). <br><strong>Output:</strong> Perangkat untuk menampilkan hasil pengolahan data (Monitor, Printer).</p>
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