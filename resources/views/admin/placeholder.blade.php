@extends('admin.layout')
@section('admin')
<h2 class="fw-bold">{{ $title }}</h2><p class="muted">Halaman ini disiapkan untuk pengelolaan {{ strtolower($title) }}. Struktur sidebar sudah tersedia dan dapat dikembangkan menjadi CRUD lengkap sesuai kebutuhan proyek.</p><div class="card-soft p-4"><div class="table-responsive"><table class="table"><thead><tr><th>Nama</th><th>Keterangan</th><th>Status</th></tr></thead><tbody><tr><td>Contoh Data</td><td>Data awal untuk tampilan admin/guru</td><td><span class="badge bg-success">Aktif</span></td></tr></tbody></table></div></div>
@endsection
