<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','EduTech Learning')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{--blue:#2563eb;--blue-dark:#1d4ed8;--cyan:#06b6d4;--purple:#a78bfa;--bg:#f4f8ff;--text:#0f172a;--muted:#64748b;--line:#e2e8f0;--card:#ffffff}
        *{letter-spacing:-.01em} body{font-family:Inter,system-ui,-apple-system,"Segoe UI",sans-serif;background:linear-gradient(180deg,#f8fbff 0%,#eef5ff 100%);color:var(--text);min-height:100vh}.navbar{background:rgba(255,255,255,.9);backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}.brand-mark{width:34px;height:34px;border-radius:12px;background:#eff6ff;display:grid;place-items:center;color:var(--blue)}.navbar-brand{font-weight:800;color:var(--text)!important}.brand-sub{font-size:11px;color:var(--muted);margin-top:-4px}.nav-link{font-size:14px;font-weight:600;color:#475569!important}.nav-link.active,.nav-link:hover{color:var(--blue)!important}.btn-main{background:var(--blue);border:0;color:#fff;border-radius:14px;padding:10px 20px;font-weight:700;box-shadow:0 10px 24px rgba(37,99,235,.22)}.btn-main:hover{background:var(--blue-dark);color:#fff}.btn-soft{background:#eff6ff;color:var(--blue);border:1px solid #dbeafe;border-radius:14px;font-weight:700}.section{padding:54px 0}.hero{padding:64px 0 40px}.card-soft{background:var(--card);border:1px solid var(--line);border-radius:22px;box-shadow:0 14px 40px rgba(15,23,42,.07)}.mini-card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px;box-shadow:0 10px 28px rgba(15,23,42,.06)}.icon-box{width:46px;height:46px;border-radius:16px;background:#eff6ff;color:var(--blue);display:grid;place-items:center;font-size:22px}.chip{display:inline-flex;gap:7px;align-items:center;background:#eff6ff;color:var(--blue);border:1px solid #dbeafe;border-radius:999px;padding:6px 12px;font-weight:700;font-size:12px}.muted{color:var(--muted)}.progress{height:10px;background:#e5e7eb;border-radius:999px}.progress-bar{background:linear-gradient(90deg,var(--cyan),var(--blue))}.status-lock{background:#f8fafc;color:#94a3b8}.status-open{background:#ecfeff;color:#0891b2}.status-done{background:#ecfdf5;color:#059669}.app-shell{display:flex;min-height:100vh}.admin-side{width:250px;background:#1e40af;color:#fff;padding:24px 16px;position:sticky;top:0;height:100vh}.admin-side a{display:flex;align-items:center;gap:10px;color:#dbeafe;text-decoration:none;padding:12px 14px;border-radius:12px;font-weight:700;font-size:14px}.admin-side a:hover,.admin-side a.active{background:rgba(255,255,255,.14);color:#fff}.admin-main{flex:1;padding:34px;background:#f4f8ff}.auth-left{background:linear-gradient(155deg,var(--blue),#2446c0);color:#fff;min-height:100vh;display:flex;align-items:center}.form-control,.form-select{border-radius:13px;border:1px solid var(--line);padding:11px 13px}.question-option{border:1px solid var(--line);border-radius:14px;padding:12px 14px;margin-bottom:10px;background:#fff}.table-soft{border-collapse:separate;border-spacing:0 12px}.table-soft tbody tr{background:#fff;box-shadow:0 6px 20px rgba(15,23,42,.05)}.table-soft td,.table-soft th{padding:16px}.illus-card{height:220px;display:grid;place-items:center}.computer-svg svg{width:90px;height:90px;color:var(--blue)}footer{background:#07112d;color:#cbd5e1}@media(max-width:991px){.hero{padding:38px 0}.section{padding:34px 0}.admin-side{position:relative;width:100%;height:auto}.app-shell{display:block}.admin-main{padding:20px}.navbar-collapse{padding-top:14px}.hide-mobile{display:none!important}}@media(max-width:576px){.display-5{font-size:2rem}.card-soft{border-radius:18px}.mini-card{padding:15px}.btn-main,.btn-soft{width:100%;margin-bottom:8px}}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-mark"><i class="bi bi-cpu"></i></span><span><span>EduTech Learning</span><div class="brand-sub">Hardware & Software Learning Media</div></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('materi.index') }}">Materi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('quiz.index') }}">Quiz</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('evaluasi.show') }}">Evaluasi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('leaderboard') }}">Leaderboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                @if(session('user_role'))
                    <li class="nav-item"><a class="btn btn-soft btn-sm" href="{{ session('user_role')==='guru' ? route('admin.dashboard') : route('dashboard.siswa') }}">Dashboard</a></li>
                @else
                    <li class="nav-item"><a class="btn btn-main btn-sm" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<main>@if(session('warning'))<div class="container mt-3"><div class="alert alert-warning card-soft">{{ session('warning') }}</div></div>@endif @yield('content')</main>
<footer class="py-4 mt-5"><div class="container text-center small">© 2026 EduTech Learning. Media pembelajaran pengenalan dasar komputer untuk SMA kelas 10–11.</div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
