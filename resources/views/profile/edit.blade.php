@extends('layouts.app')
@section('title', 'Profil Siswa')
@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3"><i class="bi bi-person-gear"></i> Profil Siswa</span>
            <h2 class="fw-bold mb-2">Ubah Data Akun</h2>
            <p class="muted mb-0">Perbarui nama, email, kelas, dan password akun belajar kamu.</p>
        </div>

        <div class="card-soft p-4 p-md-5" style="max-width:720px;">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <label class="fw-bold small mb-2">Nama Lengkap</label>
                <input class="form-control mb-3" name="name" required value="{{ old('name', $user->name) }}">

                <label class="fw-bold small mb-2">Email</label>
                <input class="form-control mb-3" type="email" name="email" required value="{{ old('email', $user->email) }}">

                <label class="fw-bold small mb-2">Kelas</label>
                <input class="form-control mb-4" name="class" value="{{ old('class', $user->class) }}" placeholder="Contoh: X IPA 1">

                <hr class="my-4">
                <h5 class="fw-bold mb-3">Ubah Password</h5>
                <p class="small muted">Kosongkan bagian password jika tidak ingin mengubah password.</p>

                <label class="fw-bold small mb-2">Password Lama</label>
                <input class="form-control mb-3" type="password" name="current_password" placeholder="Isi jika ingin mengubah password">

                <label class="fw-bold small mb-2">Password Baru</label>
                <input class="form-control mb-3" type="password" name="password" placeholder="Minimal 6 karakter">

                <label class="fw-bold small mb-2">Konfirmasi Password Baru</label>
                <input class="form-control mb-4" type="password" name="password_confirmation" placeholder="Ulangi password baru">

                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-main" type="submit"><i class="bi bi-save me-1"></i> Simpan Profil</button>
                    <a href="{{ route('dashboard.siswa') }}" class="btn btn-soft">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection