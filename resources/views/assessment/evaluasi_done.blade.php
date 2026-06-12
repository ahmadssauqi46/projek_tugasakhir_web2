@extends('layouts.app')
@section('content')
<section class="section"><div class="container"><div class="card-soft p-5 text-center mx-auto" style="max-width:560px"><div class="icon-box mx-auto mb-3"><i class="bi bi-check2-circle"></i></div><h2 class="fw-bold">Evaluasi Berhasil Dikirim</h2><p class="muted">Terima kasih. Nilai evaluasi tidak ditampilkan ke siswa, tetapi tersimpan di database untuk guru.</p><a class="btn btn-main" href="{{ route('dashboard.siswa') }}">Kembali ke Dashboard</a></div></div></section>
@endsection
