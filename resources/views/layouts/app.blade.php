<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduTech Learning')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/edutech.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <span class="brand-mark"><i class="bi bi-cpu"></i></span>
                <span class="d-block">
                    <span class="brand-title">EduTech Learning</span>
                    <span class="brand-sub d-block">Hardware & Software Learning Media</span>
                </span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    @if (session('user_role') && session('user_role') !== 'guru')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('materi.*') ? 'active' : '' }}" href="{{ route('materi.index') }}">Materi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('simulasi.interaktif') ? 'active' : '' }}" href="{{ route('simulasi.interaktif') }}">Simulasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('quiz.*') ? 'active' : '' }}" href="{{ route('quiz.index') }}">Kuis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('evaluasi.*') ? 'active' : '' }}" href="{{ route('evaluasi.show') }}">Evaluasi</a>
                        </li>
                    @endif

                    @if (!request()->routeIs('admin.*') && session('user_role') !== 'guru')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}" href="{{ route('leaderboard') }}">Leaderboard</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>

                    @if (session('user_role'))
                        <li class="nav-item">
                            <a class="btn btn-soft btn-sm px-3" href="{{ session('user_role') === 'guru' ? route('admin.dashboard') : route('dashboard.siswa') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-main btn-sm px-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if (session('warning'))
            <div class="container mt-3">
                <div class="alert alert-warning card-soft">{{ session('warning') }}</div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <small>2026 EduTech Learning - Media pembelajaran Hardware & Software untuk SMA kelas 10-11.</small>
        </div>
    </footer>

    <div class="chatbot-box" id="chatbotBox">
        <div class="chatbot-header">
            <h6>EduTech Assistant</h6>
            <small>Bantuan belajar dan penggunaan website</small>
        </div>
        <div class="chatbot-body" id="chatbotBody">
            <div class="chat-message bot">Halo, saya EduTech Assistant. Kamu bisa bertanya tentang materi, latihan, simulasi, kuis, evaluasi, leaderboard, hardware, atau software.</div>
        </div>
        <form class="chatbot-form" id="chatbotForm">
            <input type="text" id="chatbotInput" placeholder="Tulis pertanyaan..." autocomplete="off">
            <button type="submit" aria-label="Kirim pesan"><i class="bi bi-send"></i></button>
        </form>
    </div>

    <button type="button" class="chatbot-toggle" id="chatbotToggle" aria-label="Buka chatbot">
        <i class="bi bi-chat-dots"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = document.querySelector(button.getAttribute('data-toggle-password'));
                    if (!input) return;
                    input.type = input.type === 'password' ? 'text' : 'password';
                    button.innerHTML = input.type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
                });
            });

            const chatbotBox = document.getElementById('chatbotBox');
            const chatbotToggle = document.getElementById('chatbotToggle');
            const chatbotBody = document.getElementById('chatbotBody');
            const chatbotForm = document.getElementById('chatbotForm');
            const chatbotInput = document.getElementById('chatbotInput');
            if (!chatbotBox || !chatbotToggle || !chatbotBody || !chatbotForm || !chatbotInput) return;

            chatbotToggle.addEventListener('click', function () { chatbotBox.classList.toggle('show'); });
            chatbotForm.addEventListener('submit', function (event) {
                event.preventDefault();
                const question = chatbotInput.value.trim();
                if (!question) return;
                addMessage(question, 'user');
                chatbotInput.value = '';
                setTimeout(function () { addMessage(getBotReply(question), 'bot'); }, 400);
            });

            function addMessage(text, type) {
                const message = document.createElement('div');
                message.className = 'chat-message ' + type;
                message.textContent = text;
                chatbotBody.appendChild(message);
                chatbotBody.scrollTop = chatbotBody.scrollHeight;
            }

            function getBotReply(question) {
                const text = question.toLowerCase();
                if (text.includes('materi')) return 'Materi berisi pembelajaran hardware dan software yang disusun bertahap. Login terlebih dahulu untuk mengaksesnya.';
                if (text.includes('latihan')) return 'Latihan digunakan untuk mengecek pemahaman setelah membaca materi.';
                if (text.includes('simulasi')) return 'Simulasi interaktif digunakan untuk praktik memahami hardware dan software setelah login.';
                if (text.includes('quiz') || text.includes('kuis')) return 'Kuis dikerjakan setelah latihan modul selesai. Nilainya tersimpan ke database.';
                if (text.includes('evaluasi')) return 'Evaluasi adalah penilaian akhir setelah semua materi dan kuis selesai.';
                if (text.includes('leaderboard')) return 'Leaderboard menampilkan peringkat siswa berdasarkan nilai, poin, dan progress belajar.';
                if (text.includes('hardware')) return 'Hardware adalah perangkat keras komputer, contohnya keyboard, mouse, monitor, CPU, RAM, dan storage.';
                if (text.includes('software')) return 'Software adalah perangkat lunak seperti sistem operasi, aplikasi, driver, dan utility.';
                if (text.includes('login')) return 'Gunakan tombol Login di navbar untuk masuk ke akun siswa atau guru.';
                if (text.includes('terkunci')) return 'Materi terkunci jika latihan dan kuis materi sebelumnya belum selesai.';
                return 'Maaf, saya belum memahami pertanyaan itu. Coba tanyakan tentang materi, latihan, simulasi, kuis, evaluasi, leaderboard, hardware, atau software.';
            }
        });
    </script>
</body>
</html>