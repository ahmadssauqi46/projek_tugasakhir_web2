<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGame Learning</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            overflow-x: hidden;
            background: #f5f7ff;
        }

        .navbar{
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
        }

        .navbar-brand{
            font-size: 30px;
            font-weight: 700;
            color: #4f46e5 !important;
        }

        .nav-link{
            color: #333 !important;
            margin-left: 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover{
            color: #4f46e5 !important;
        }

        .btn-login{
            background: #4f46e5;
            color: white;
            border-radius: 30px;
            padding: 10px 25px;
            margin-left: 20px;
            font-weight: 500;
        }

        .btn-login:hover{
            background: #4338ca;
            color: white;
        }

        .hero{
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
            padding-top: 80px;
        }

        .hero h1{
            font-size: 64px;
            font-weight: 700;
            line-height: 1.2;
        }

        .hero p{
            margin-top: 20px;
            font-size: 18px;
            color: rgba(255,255,255,0.9);
        }

        .btn-start{
            margin-top: 30px;
            padding: 15px 35px;
            border-radius: 50px;
            border: none;
            background: white;
            color: #4f46e5;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-start:hover{
            transform: translateY(-5px);
        }

        .hero img{
            width: 100%;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float{

            0%{
                transform: translateY(0px);
            }

            50%{
                transform: translateY(-15px);
            }

            100%{
                transform: translateY(0px);
            }

        }

        .feature{
            padding: 100px 0;
        }

        .title{
            text-align: center;
            margin-bottom: 60px;
        }

        .title h2{
            font-weight: 700;
        }

        .feature-card{
            background: white;
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .feature-card:hover{
            transform: translateY(-10px);
        }

        .icon{
            width: 80px;
            height: 80px;
            background: #eef2ff;
            margin: auto;
            margin-bottom: 25px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
        }

        .about{
            padding: 100px 0;
            background: white;
        }

        .about img{
            width: 100%;
        }

        .about h2{
            font-weight: 700;
            margin-bottom: 20px;
        }

        footer{
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media(max-width:991px){

            .hero{
                text-align: center;
                padding: 130px 0 80px;
            }

            .hero h1{
                font-size: 42px;
            }

            .hero img{
                margin-top: 50px;
            }

        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">EduGame</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

           <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/materi') }}">Materi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/quiz') }}">Quiz</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-login" href="{{ url('/login') }}">Login</a>
                </li>
             </ul>
        </div>
    </div>
</nav>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>
                        Belajar Komputer Jadi Lebih Interaktif
                    </h1>

                    <p>
                        Platform pembelajaran modern berbasis web dengan
                        quiz interaktif dan tracking skor secara real-time.
                    </p>

                    <button class="btn-start">
                        Mulai Belajar
                    </button>

                </div>

                <div class="col-lg-6">

                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">

                </div>
            </div>
        </div>
    </section>

    <section class="feature">
        <div class="container">
            <div class="title">
                <h2>Fitur Unggulan</h2>
                <p>
                    Sistem pembelajaran modern untuk siswa
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="icon">📚</div>

                        <h4>Materi Interaktif</h4>
                        <p>
                            Belajar materi komputer dengan tampilan modern dan mudah dipahami.
                        </p>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="icon">
                            🧠
                        </div>

                        <h4>Quiz Interaktif</h4>

                        <p>
                            Quiz menarik dengan konsep gamification minimalis.
                        </p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="icon">📈</div>
                        <h4>Real-Time Score</h4>
                        <p>
                            Tracking skor dan progress belajar secara langsung.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png">
                </div>

                <div class="col-lg-6">

                    <h2>
                        Tentang Website
                    </h2>

                    <p>
                        EduGame adalah media pembelajaran berbasis web
                        yang membantu siswa belajar komputer dengan
                        lebih menarik, modern, dan interaktif.
                    </p>

                    <p>
                        Website ini menggunakan pendekatan gamification
                        dan tracking skor real-time untuk meningkatkan
                        motivasi belajar siswa.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <footer>

        <p class="mb-0">
            © 2026 EduGame Learning
        </p>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>