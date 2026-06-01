<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'EduTech Learning' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #7c3aed;
            --soft: #eef2ff;
            --dark: #0f172a;
        }

        * {
            font-family: Poppins, sans-serif;
        }

        body {
            background: #f6f8ff;
            color: var(--dark);
        }

        .navbar {
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            box-shadow: 0 4px 20px rgba(15, 23, 42, .06);
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--primary) !important;
        }

        .nav-link {
            font-weight: 600;
        }

        .btn-main {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: 0;
            border-radius: 14px;
            padding: 11px 20px;
            font-weight: 700;
        }

        .btn-soft {
            background: #eef2ff;
            color: #4338ca;
            border: 0;
            border-radius: 12px;
            font-weight: 700;
        }

        .section {
            padding: 80px 0;
        }

        .hero {
            padding: 110px 0 80px;
            background: radial-gradient(circle at top right,
                    #c4b5fd 0,
                    #7c3aed 35%,
                    #4f46e5 70%);
            color: white;
        }

        .card-soft {
            background: white;
            border: 0;
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(79, 70, 229, .08);
        }

        footer {
            background: #0f172a;
            color: white;
            padding: 26px 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                EduTech Learning
            </a>

            <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="nav">

                <ul class="navbar-nav gap-lg-3 align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('materi.index') }}">
                            Materi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quiz.index') }}">
                            Quiz
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('evaluasi.show') }}">
                            Evaluasi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-main" href="{{ route('admin.dashboard') }}">
                            Admin 
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    @if(session('success') || session('warning'))
        <div class="container mt-3">

            <div class="alert alert-{{ session('success') ? 'success' : 'warning' }}">
                {{ session('success') ?? session('warning') }}
            </div>

        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container text-center">
            © {{ date('Y') }} EduTech Learning —
            Media pembelajaran berbasis TPACK,
            latihan, quiz, evaluasi, dan CRUD.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

</body>
</html>