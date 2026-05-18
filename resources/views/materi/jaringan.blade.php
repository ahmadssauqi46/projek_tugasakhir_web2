<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Jaringan Komputer Lengkap</title>
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
            background: #dcfce7; 
            color: #16a34a; 
            font-weight: 600; 
            padding: 8px 16px; 
            border-radius: 30px; 
            display: inline-block; 
            margin-bottom: 15px; 
        }
        .component-box { 
            background: #f8fafc; 
            border-left: 4px solid #10b981; 
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
            <h1>Jaringan Komputer</h1>
            <p>Protokol Komunikasi Data, Struktur Topologi, Model Arsitektur Referensi OSI & TCP/IP</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card fade-content" id="network-material-box">
                        
                        <div id="page-1">
                            <span class="badge-kategori">Modul 03 - Bagian 1: Model Referensi Protokol & Topologi</span>
                            <h2>Dasar-Dasar Komunikasi Data Jaringan</h2>
                            <p class="text-muted">Jaringan komputer meregulasi pertukaran paket data digital antar simpul terminal komputer independen melalui aturan standarisasi baku global.</p>
                            
                            <h4 class="mt-4 mb-3">Model Referensi Standarisasi Lapisan Jaringan:</h4>
                            
                            <div class="component-box">
                                <h5>1. Model Arsitektur OSI 7 Layer & TCP/IP Stack</h5>
                                <p class="mb-2">Komunikasi data diatur berjenjang dari pemrosesan bit biner fisik hingga aplikasi pengguna akhir:</p>
                                <ul>
                                    <li><strong>Physical & Data Link Layer:</strong> Mengatur pengiriman bit lewat media transmisi tegangan listrik/cahaya dan pengalamatan perangkat keras fisik mac-address (Ethernet Frame).</li>
                                    <li><strong>Network Layer:</strong> Bertanggung jawab atas pengalamatan logis logikal logika global dan penentuan rute paket via protokol **IP (Internet Protocol)** berupa IPv4/IPv6.</li>
                                    <li><strong>Transport Layer:</strong> Memastikan transfer data andal handal via protokol **TCP (Transmission Control Protocol)** atau pengiriman cepat non-koneksi via **UDP (User Datagram Protocol)**.</li>
                                    <li><strong>Application Layer:</strong> Tempat berjalannya layanan web aplikasi seperti HTTP/HTTPS (Web), FTP (File Transfer), dan DNS (Domain Name Resolution).</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>2. Topologi Jaringan Komputer</h5>
                                <p class="mb-2">Struktur geometris tata letak fisik hubungan antarkomputer:</p>
                                <ul>
                                    <li><strong>Topologi Star:</strong> Setiap node terhubung pusat ke switch pusat. Memiliki skalabilitas tinggi dan isolasi kerusakan kabel yang baik.</li>
                                    <li><strong>Topologi Mesh:</strong> Setiap simpul terhubung langsung ke seluruh simpul lain. Redundansi jalur transmisi maksimal namun boros investasi infrastruktur kabel.</li>
                                </ul>
                            </div>
                        </div>

                        <div id="page-2" class="d-none">
                            <span class="badge-kategori">Modul 03 - Bagian 2: Infrastruktur Perangkat & Manajemen Alamat IP</span>
                            <h2>Perangkat Distribusi Sinyal Aktif dan Pengalamatan Logis</h2>
                            <p class="text-muted">Infrastruktur fisik jaringan membutuhkan perangkat pintar penapis data serta pembagian identitas biner unik pada terminal klien.</p>
                            
                            <h4 class="mt-4 mb-3">Infrastruktur Perangkat Keras Jaringan:</h4>

                            <div class="component-box">
                                <h5>3. Router vs Switch Intelligent Routing</h5>
                                <p class="mb-2">Dua perangkat vital pembentuk jaringan komputer berskala luas:</p>
                                <ul>
                                    <li><strong>Switch (Layer 2 Device):</strong> Membaca *MAC Address* tujuan untuk mendistribusikan data hanya ke port perangkat spesifik yang dituju di dalam satu jaringan lokal (LAN) guna meminimalkan tabrakan data (collision domain).</li>
                                    <li><strong>Router (Layer 3 Device):</strong> Membaca *IP Address* untuk menghubungkan beberapa sub-jaringan yang berbeda segmen IP, bertindak sebagai gerbang keluar masuk utama (*default gateway*) menuju jaringan publik global.</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>4. Media Transmisi Fisik Terbimbing</h5>
                                <p class="mb-0">Kabel **UTP (Unshielded Twisted Pair)** kategori Cat5e/Cat6 memanfaatkan pulsa listrik tembaga berpilin untuk mengurangi interferensi elektromagnetik dengan batas jarak efektif 100 meter. Sementara kabel **Fiber Optic** menggunakan inti kaca murni yang mentransmisikan data pulsa cahaya laser berkecepatan tinggi, bebas interferensi frekuensi radio, serta sanggup menjangkau jarak puluhan kilometer antar-benua.</p>
                            </div>

                            <div class="component-box">
                                <h5>5. Dasar IP Addressing & Subnetting</h5>
                                <p class="mb-0">Setiap perangkat wajib memiliki identitas biner unik. Contohnya IPv4 yang terdiri dari 32-bit angka biner yang dipisahkan menjadi 4 oktet desimal (misal 192.168.1.1). Proses **Subnetting** diterapkan menggunakan *Subnet Mask* (seperti 255.255.255.0 atau prefiks /24) untuk memecah satu blok jaringan besar menjadi segmen sub-jaringan kecil yang lebih efisien dan aman terkontrol.</p>
                            </div>
                        </div>

                        <div class="row g-2 mt-5 pt-3 border-top">
                            <div class="col-md-4 text-start">
                                <a href="/materi" class="btn btn-outline-secondary w-100 py-2 fw-medium" id="back-btn" style="border-radius: 10px;">
                                    &larr; Kembali ke Materi
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="/quiz/jaringan" class="btn btn-custom-quiz w-100 py-2 fw-medium" style="border-radius: 10px;">
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
                nextMateriBtn.innerHTML = "Selesai Belajar &rarr;";
                currentPage = 2;
            } else if (currentPage === 2) {
                window.location.href = "/materi";
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