<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi & Quiz Interaktif - EduGame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
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
        .quiz-banner {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .topic-card {
            background: white;
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 35px 25px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .topic-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(79, 70, 229, 0.1);
        }
        .topic-icon {
            font-size: 40px;
            margin-bottom: 20px;
        }
        .btn-teori {
            background-color: #ededff;
            color: #4f46e5;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            transition: 0.2s;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .btn-teori:hover {
            background-color: #dbdbff;
            color: #3730a3;
        }
        .btn-praktik {
            background-color: #22c55e;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            transition: 0.2s;
            text-decoration: none;
            display: block;
        }
        .btn-praktik:hover {
            background-color: #16a34a;
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
                        <a class="nav-link" href="{{ url('/materi') }}">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="{{ url('/quiz') }}">Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="quiz-banner">
        <div class="container">
            <h1 class="fw-bold mb-3">Evaluasi & Quiz Interaktif</h1>
            <p class="fs-5 opacity-75 mb-0">Pilih topik materi di bawah ini untuk mulai menguji kemampuan teoritis atau praktik gamifikasimu!</p>
        </div>
    </div>

    <div class="container my-5 py-3">
        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4">
                <div class="card topic-card text-center">
                    <div>
                        <div class="topic-icon">💻</div>
                        <h4 class="fw-bold text-dark mb-3">Topik Hardware</h4>
                        <p class="text-secondary small px-2">Uji pengetahuan dan praktik visualmu mengenai komponen fisik komputer seperti CPU, RAM, dan Storage.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ url('/quiz/hardware') }}" class="btn btn-teori">📝 Mulai Kuis Teori</a>
                        <a href="{{ url('/game/hardware') }}" class="btn btn-praktik">🎮 Main Game Praktik</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card topic-card text-center">
                    <div>
                        <div class="topic-icon">⚙️</div>
                        <h4 class="fw-bold text-dark mb-3">Topik Software</h4>
                        <p class="text-secondary small px-2">Pelajari dan klasifikasikan perbedaan mendasar antara Sistem Operasi, Aplikasi, dan Utility komputer.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ url('/quiz/software') }}" class="btn btn-teori">📝 Mulai Kuis Teori</a>
                        <a href="{{ url('/game/software') }}" class="btn btn-praktik">🎮 Main Game Praktik</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card topic-card text-center">
                    <div>
                        <div class="topic-icon">🌐</div>
                        <h4 class="fw-bold text-dark mb-3">Topik Jaringan</h4>
                        <p class="text-secondary small px-2">Uji wawasan arsitektur jaringan komputer mengenai cakupan LAN, WAN, internet, beserta topologinya.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ url('/quiz/jaringan') }}" class="btn btn-teori">📝 Mulai Kuis Teori</a>
                        <a href="{{ url('/game/jaringan') }}" class="btn btn-praktik">🎮 Main Game Praktik</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>