<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f5f7ff;
        }

        .navbar{
            background: #4f46e5;
        }

        .navbar-brand,
        .nav-link{
            color: white !important;
        }

        .header{
            padding: 120px 0 50px;
            text-align: center;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
        }

        .materi-card{
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="/">
                EduGame
            </a>

            <div class="navbar-nav ms-auto">

                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/materi">Materi</a>
                <a class="nav-link" href="/about">About</a>

            </div>

        </div>

    </nav>

    <section class="header">

        <div class="container">

            <h1>Materi Pembelajaran</h1>

            <p>
                Pelajari materi komputer dengan mudah dan interaktif
            </p>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <div class="materi-card">

                <h3>Hardware Komputer</h3>

                <p>
                    Mempelajari perangkat keras komputer seperti CPU,
                    RAM, motherboard, dan perangkat input output.
                </p>

                <button class="btn btn-primary">
                    Baca Materi
                </button>

            </div>

            <div class="materi-card">

                <h3>Software Komputer</h3>

                <p>
                    Mengenal sistem operasi, aplikasi, dan software
                    pendukung komputer.
                </p>

                <button class="btn btn-primary">
                    Baca Materi
                </button>

            </div>

            <div class="materi-card">

                <h3>Jaringan Komputer</h3>

                <p>
                    Memahami konsep jaringan LAN, WAN, internet,
                    dan komunikasi data.
                </p>

                <button class="btn btn-primary">
                    Baca Materi
                </button>
            </div>
        </div>
    </section>
</body>
</html>