@extends('layouts.app')
@section('title','Login EduTech')

@section('content')
<section class="auth-section">
    <div class="container">
        <div class="card-soft auth-panel">
            <div class="row g-0 h-100">
                <div class="col-lg-6 auth-hero d-flex flex-column justify-content-between">
                    <div>
                        <span class="chip bg-white text-primary border-0 mb-4">
                            <i class="bi bi-shield-check"></i>
                            Akses Pembelajaran
                        </span>

                        <h1 class="fw-bold text-white mb-3" style="font-size:46px;line-height:1.08;">
                            Masuk ke EduTech Learning
                        </h1>

                        <p class="text-white mb-0" style="font-size:17px;line-height:1.8;opacity:.92;">
                            Siswa dapat melanjutkan materi, latihan, quiz, dan evaluasi. Guru dapat mengelola modul, soal, nilai, serta leaderboard melalui dashboard admin.
                        </p>
                    </div>

                    <div class="row g-3 mt-5">
                        <div class="col-sm-6">
                            <div class="auth-feature">
                                <b>Untuk Siswa</b><br>
                                <small>Belajar materi dan mengerjakan soal.</small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="auth-feature">
                                <b>Untuk Guru</b><br>
                                <small>Mengelola data pembelajaran.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center justify-content-center p-4 p-md-5">
                    <form method="POST" action="{{ route('login.store') }}" class="card-soft auth-card">
                        @csrf

                        <div class="mb-4">
                            <h2 class="fw-bold mb-1">Login Akun</h2>
                            <p class="small mb-0">Pilih jenis pengguna sesuai akun.</p>
                        </div>

                        <div class="d-flex gap-2 mb-4">
                            <input class="btn-check" type="radio" name="role" id="siswa" value="siswa" checked>
                            <label class="btn btn-soft flex-fill" for="siswa">
                                Siswa
                            </label>

                            <input class="btn-check" type="radio" name="role" id="guru" value="guru">
                            <label class="btn btn-soft flex-fill" for="guru">
                                Guru
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold small mb-2">Nama Lengkap</label>
                            <input class="form-control" name="name" placeholder="Contoh: Bima Pratama">
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold small mb-2">Email / Username</label>
                            <input class="form-control" name="email" required placeholder="nama@email.com">
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold small mb-2">Password</label>
                            <div class="password-field">
                                <input id="loginPassword" class="form-control" type="password" name="password" required placeholder="Masukkan password">
                                <button class="password-toggle" type="button" data-toggle-password="#loginPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button class="btn btn-main w-100">
                            Masuk
                        </button>

                        <p class="small text-center mt-4 mb-0">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="fw-bold">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection