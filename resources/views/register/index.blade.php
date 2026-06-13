@extends('layouts.app')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="card-soft auth-panel">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-6 auth-hero">
                    <div>
                        <div class="brand-mark bg-white text-primary mb-4"><i class="bi bi-cpu"></i></div>
                        <span class="chip bg-white text-primary border-0 mb-3"><i class="bi bi-stars"></i> Mulai belajar interaktif</span>
                        <h2 class="fw-bold mb-3">Daftar dan Ikuti Pembelajaran</h2>
                        <p class="mb-0">Buat akun untuk mengakses materi hardware dan software, mengerjakan latihan, mengikuti quiz, mengirim evaluasi, serta melihat progress belajar.</p>
                    </div>
                    <div class="row g-3 mt-4">
                        <div class="col-sm-6"><div class="auth-feature"><b>Latihan Cepat</b><br><small>Hasil langsung tampil.</small></div></div>
                        <div class="col-sm-6"><div class="auth-feature"><b>Leaderboard</b><br><small>Poin dan badge belajar.</small></div></div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5">
                    <form method="POST" action="{{ route('register.store') }}" class="card-soft auth-card">
                        @csrf
                        <div class="text-center mb-4">
                            <div class="icon-box mx-auto mb-3"><i class="bi bi-person-plus"></i></div>
                            <h3 class="fw-bold mb-1">Register Akun</h3>
                            <p class="muted small mb-0">Lengkapi data pengguna</p>
                        </div>

                        <div class="d-flex gap-2 mb-4">
                            <input class="btn-check" type="radio" name="role" id="rsiswa" value="siswa" checked>
                            <label class="btn btn-soft flex-fill" for="rsiswa"><i class="bi bi-mortarboard me-1"></i> Siswa</label>
                            <input class="btn-check" type="radio" name="role" id="rguru" value="guru">
                            <label class="btn btn-soft flex-fill" for="rguru"><i class="bi bi-person-workspace me-1"></i> Guru</label>
                        </div>

                        <label class="fw-bold small mb-2">Nama Lengkap</label>
                        <input class="form-control mb-3" name="name" required placeholder="Contoh: Aulia Rahma">

                        <label class="fw-bold small mb-2">Email / Username</label>
                        <input class="form-control mb-3" name="email" required placeholder="nama@email.com">

                        <label class="fw-bold small mb-2">Password</label>
                        <div class="password-field mb-3">
                            <input id="registerPassword" class="form-control" type="password" name="password" required placeholder="Buat password">
                            <button class="password-toggle" type="button" data-toggle-password="#registerPassword"><i class="bi bi-eye"></i></button>
                        </div>

                        <label class="fw-bold small mb-2">Kelas</label>
                        <input class="form-control mb-4" name="class" placeholder="Contoh: X IPA 1">

                        <button class="btn btn-main w-100">Daftar Sekarang</button>
                        <p class="small text-center mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="fw-bold">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
