<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f7ff;
        }

        /* Style Kustom Navbar EduGame Terdahulu */
        .navbar-custom {
            background-color: #4f46e5;
            padding: 15px 0;
        }

        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 24px;
        }

        .navbar-custom .nav-link {
            color: white !important;
            opacity: 0.9;
            font-size: 16px;
        }

        .navbar-custom .nav-link:hover {
            opacity: 1;
        }

        .header {
            padding: 60px 0 50px;
            text-align: center;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
        }

        .materi-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .materi-card:hover {
            transform: translateY(-5px);
        }

        .btn-baca {
            background: #4f46e5;
            color: white;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
            border: none;
            transition: 0.3s;
        }

        .btn-baca:hover {
            background: #3730a3;
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">EduGame</a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="{{ url('/materi') }}">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="header">
        <div class="container">
            <h1 class="fw-bold">Materi Pembelajaran</h1>
            <p class="opacity-75">
                Pelajari materi komputer dengan mudah dan interaktif
            </p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="materi-card">
                <h3>Hardware Komputer</h3>
                <p class="text-secondary">
                    Mempelajari perangkat keras komputer seperti CPU,
                    RAM, motherboard, dan perangkat input output.
                </p>
                <a href="{{ url('/materi/hardware') }}" class="btn btn-baca d-inline-block text-decoration-none">
                    Baca Materi
                </a>
            </div>

            <div class="materi-card">
                <h3>Software Komputer</h3>
                <p class="text-secondary">
                    Mengenal sistem operasi, aplikasi, and software
                    pendukung komputer.
                </p>
                <a href="{{ url('/materi/software') }}" class="btn btn-baca d-inline-block text-decoration-none">
                    Baca Materi
                </a>
            </div>

            <div class="materi-card">
                <h3>Jaringan Komputer</h3>
                <p class="text-secondary">
                    Memahami konsep jaringan LAN, WAN, internet,
                    dan komunikasi data.
                </p>
                <a href="{{ url('/materi/jaringan') }}" class="btn btn-baca d-inline-block text-decoration-none">
                    Baca Materi
                </a>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>