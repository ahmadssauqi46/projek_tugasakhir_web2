<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Topik Quiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f5f7ff; }
        .navbar { background: #4f46e5; }
        .navbar-brand, .nav-link { color: white !important; }
        
        .header-quiz {
            padding: 120px 0 50px;
            text-align: center;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
        }

        .topic-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border: 2px solid transparent;
        }

        .topic-card:hover {
            transform: translateY(-8px);
            border-color: #4f46e5;
        }

        .quiz-icon {
            font-size: 45px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-mulai {
            background: #4f46e5;
            color: white;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 500;
            transition: 0.3s;
            border: none;
        }

        .btn-mulai:hover {
            background: #3730a3;
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">EduGame</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">Home</a>
                <a class="nav-link" href="/materi">Materi</a>
                <a class="nav-link active" href="/quiz">Quiz</a>
                <a class="nav-link" href="/about">About</a>
            </div>
        </div>
    </nav>

    <section class="header-quiz">
        <div class="container">
            <h1>Evaluasi & Quiz Interaktif</h1>
            <p>Pilih topik materi di bawah ini untuk mulai menguji kemampuan gamedifikasi kamu!</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <div class="topic-card">
                        <div class="quiz-icon">💻</div>
                        <h4>Quiz Hardware</h4>
                        <p class="text-muted mb-4">Uji pengetahuanmu tentang CPU, RAM, Storage, dan komponen fisik komputer.</p>
                        <a href="{{ url('/quiz/hardware') }}" class="btn btn-mulai text-decoration-none">Mulai Quiz</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="topic-card">
                        <div class="quiz-icon">⚙️</div>
                        <h4>Quiz Software</h4>
                        <p class="text-muted mb-4">Uji pemahaman mengenai Sistem Operasi, Software Aplikasi, dan Utilitas.</p>
                        <a href="{{ url('/quiz/software') }}" class="btn btn-mulai text-decoration-none">Mulai Quiz</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="topic-card">
                        <div class="quiz-icon">🌐</div>
                        <h4>Quiz Jaringan</h4>
                        <p class="text-muted mb-4">Uji wawasan seputar LAN, WAN, internet, beserta perangkat transmisinya.</p>
                        <a href="{{ url('/quiz/jaringan') }}" class="btn btn-mulai text-decoration-none">Mulai Quiz</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
</html>