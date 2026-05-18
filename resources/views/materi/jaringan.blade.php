<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Jaringan Komputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f5f7ff; }
        .navbar { background: #4f46e5; }
        .navbar-brand, .nav-link { color: white !important; }
        .header-materi { padding: 100px 0 40px; background: linear-gradient(135deg,#4f46e5,#7c3aed); color: white; text-align: center; }
        .content-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-top: -30px; }
        .badge-kategori { background: #dcfce7; color: #16a34a; font-weight: 600; padding: 8px 16px; border-radius: 30px; display: inline-block; margin-bottom: 15px; }
        .component-box { background: #f8fafc; border-left: 4px solid #10b981; padding: 15px; margin-bottom: 15px; border-radius: 0 10px 10px 0; }
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
            <h1>Jaringan Komputer</h1>
            <p>Memahami Cara Komputer Berkomunikasi dan Bertukar Informasi</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card">
                        <span class="badge-kategori">Modul 03</span>
                        <h2>Apa itu Jaringan Komputer?</h2>
                        <p class="text-muted">Jaringan komputer adalah sistem yang menghubungkan dua atau lebih perangkat komputer menggunakan media kabel atau nirkabel (wireless) agar dapat saling berbagi data, file, printer, hingga koneksi internet.</p>
                        
                        <h4 class="mt-4 mb-3">Jenis Jaringan Berdasarkan Jangkauan Geografis:</h4>
                        
                        <div class="component-box">
                            <h5>1. LAN (Local Area Network)</h5>
                            <p class="mb-0">Jaringan dengan skala kecil dan area terbatas. Biasanya digunakan di dalam satu ruangan, rumah, sekolah, atau gedung kantor.</p>
                        </div>

                        <div class="component-box">
                            <h5>2. MAN (Metropolitan Area Network)</h5>
                            <p class="mb-0">Jaringan yang menghubungkan beberapa jaringan LAN di area yang lebih luas, seperti jaringan komputer antar-kantor dalam satu kota.</p>
                        </div>

                        <div class="component-box">
                            <h5>3. WAN (Wide Area Network)</h5>
                            <p class="mb-0">Jaringan berskala sangat besar yang mencakup area geografis yang sangat luas, seperti jaringan komputer antar-negara atau benua. Internet adalah contoh terbesar dari WAN.</p>
                        </div>

                        <h4 class="mt-4 mb-3">Perangkat Keras Jaringan:</h4>
                        <ul>
                            <li><strong>Router:</strong> Mengatur rute perjalanan data dan menghubungkan jaringan lokal ke internet.</li>
                            <li><strong>Switch/Hub:</strong> Menghubungkan banyak komputer dalam satu jaringan lokal (LAN).</li>
                            <li><strong>Kabel UTP/LAN & Modem:</strong> Media transmisi fisik dan pengubah sinyal internet.</li>
                        </ul>

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