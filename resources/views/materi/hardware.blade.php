<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi - Hardware Komputer Lengkap</title>
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
            background: #eef2ff; 
            color: #4f46e5; 
            font-weight: 600; 
            padding: 8px 16px; 
            border-radius: 30px; 
            display: inline-block; 
            margin-bottom: 15px; 
        }
        .component-box { 
            background: #f8fafc; 
            border-left: 4px solid #4f46e5; 
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
            <h1>Hardware Komputer</h1>
            <p>Arsitektur, Komponen Pemrosesan, Penyimpanan, dan Struktur Fisik Sistem Komputer</p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="content-card fade-content" id="hardware-material-box">
                        
                        <div id="page-1">
                            <span class="badge-kategori">Modul 01 - Bagian 1: Pemrosesan & Memori Utama</span>
                            <h2>Pengantar Hardware Komputer</h2>
                            <p class="text-muted">Hardware adalah substansi fisik materi arsitektur komputer. Seluruh operasi digital dieksekusi secara nyata melalui interaksi sirkuit elektronik, semikonduktor, dan komponen magnetik atau optik di dalam perangkat.</p>
                            
                            <h4 class="mt-4 mb-3">Unit Pemrosesan Pusat dan Memori Utama:</h4>
                            
                            <div class="component-box">
                                <h5>1. Central Processing Unit (CPU) - Mikroprosesor</h5>
                                <p class="mb-2">CPU mengeksekusi instruksi program menggunakan siklus fetch, decode, dan execute. Komponen internalnya meliputi:</p>
                                <ul>
                                    <li><strong>ALU (Arithmetic Logic Unit):</strong> Melakukan perhitungan matematis komputasional dan operasi logika biner.</li>
                                    <li><strong>CU (Control Unit):</strong> Mengarahkan lalu lintas data, menginterpretasikan instruksi, dan menyinkronkan komponen sistem.</li>
                                    <li><strong>Registers:</strong> Memori internal berkecepatan sangat tinggi untuk menyimpan instruksi yang sedang diproses.</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>2. Arsitektur Memori Utama (RAM & Cache)</h5>
                                <p class="mb-2">RAM adalah media penyimpanan volatil yang berarti data hilang saat daya listrik terputus. Berfungsi memuat instruksi OS dan aplikasi yang sedang aktif agar dapat diakses CPU secara acak dengan latensi rendah.</p>
                                <p class="mb-0">Di atas RAM, terdapat <strong>Cache Memory (L1, L2, L3)</strong> yang terintegrasi langsung di dalam die prosesor untuk menjembatani perbedaan kecepatan komputasi CPU dan bus memori utama.</p>
                            </div>

                            <div class="component-box">
                                <h5>3. Non-Volatile Storage (SSD vs HDD)</h5>
                                <p class="mb-2">Media penyimpanan sekunder eksternal yang bersifat permanen:</p>
                                <ul>
                                    <li><strong>Solid State Drive (SSD):</strong> Memanfaatkan chip memori flash NAND tanpa komponen bergerak. Menawarkan kecepatan transfer data (Read/Write) hingga ribuan megabyte per detik dan ketahanan guncangan tinggi.</li>
                                    <li><strong>Hard Disk Drive (HDD):</strong> Memanfaatkan piringan magnetik berputar (platter) dan *read/write head* mekanis. Kapasitas besar dengan harga ekonomis namun rentan fragmentasi data dan aus mekanis.</li>
                                </ul>
                            </div>
                        </div>

                        <div id="page-2" class="d-none">
                            <span class="badge-kategori">Modul 01 - Bagian 2: Periferal, Antarmuka & Distribusi Daya</span>
                            <h2>Sistem Hubungan I/O dan Regulasi Tegangan</h2>
                            <p class="text-muted">Komputer memerlukan subsistem untuk berinteraksi dengan lingkungan luar, menyalurkan energi, serta mengintegrasikan komponen internal melalui papan sirkuit utama.</p>
                            
                            <h4 class="mt-4 mb-3">Sistem Antarmuka dan Manajemen Komponen:</h4>

                            <div class="component-box">
                                <h5>4. Motherboard & Chipset</h5>
                                <p class="mb-0">Motherboard adalah papan sirkuit cetak utama (PCB) tempat bertemunya seluruh komponen utama. Di dalamnya terdapat <strong>Chipset (Northbridge/Southbridge atau arsitektur modern tunggal)</strong> yang mengatur jalur komunikasi data berkecepatan tinggi via jalur PCIe (PCI Express), antarmuka SATA, dan pengontrol periferal luar.</p>
                            </div>

                            <div class="component-box">
                                <h5>5. Periferal Input dan Output (Sub-sistem Antarmuka)</h5>
                                <p class="mb-2">Sistem input mengubah data fisik lingkungan menjadi sinyal digital biner, sedangkan output menerjemahkan biner menjadi representasi fisik yang dipahami manusia:</p>
                                <ul>
                                    <li><strong>Input Tingkat Lanjut:</strong> Sensor, Scanner Optik, Digitizer, Keyboard mekanis dengan matriks dioda, dan Mouse optik dengan sensor CMOS.</li>
                                    <li><strong>Output Tingkat Lanjut:</strong> Panel Monitor (IPS, OLED) dengan matriks transistor film tipis, Printer termal/laser, dan GPU (Graphics Processing Unit) eksternal untuk rendering grafis 3D intensif.</li>
                                </ul>
                            </div>

                            <div class="component-box">
                                <h5>6. Power Supply Unit (PSU) & Regulasi Daya</h5>
                                <p class="mb-0">PSU mengonversi arus bolak-balik (AC) dari sumber listrik dinding menjadi arus searah (DC) dengan voltase rendah yang dibutuhkan komponen (+3.3V, +5V, +12V). Kualitas PSU ditentukan oleh sertifikasi efisiensi (80 Plus) dan regulasi tegangan guna mencegah kerusakan komponen akibat lonjakan arus.</p>
                            </div>
                        </div>

                        <div class="row g-2 mt-5 pt-3 border-top">
                            <div class="col-md-4 text-start">
                                <a href="/materi" class="btn btn-outline-secondary w-100 py-2 fw-medium" id="back-btn" style="border-radius: 10px;">
                                    &larr; Kembali ke Materi
                                </a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="/quiz/hardware" class="btn btn-custom-quiz w-100 py-2 fw-medium" style="border-radius: 10px;">
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
                nextMateriBtn.innerHTML = "Materi Software &rarr;";
                currentPage = 2;
            } else if (currentPage === 2) {
                window.location.href = "/materi/software";
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