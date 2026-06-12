@extends('layouts.app')
@section('content')
<section class="section"><div class="container"><div class="card-soft p-5 text-center mx-auto" style="max-width:560px"><div class="icon-box mx-auto mb-3"><i class="bi bi-award"></i></div><h2 class="fw-bold">Quiz Selesai</h2><p class="muted">Nilai kamu tersimpan ke database.</p><div class="display-3 fw-bold text-primary">{{ $score }}</div><p>Benar {{ $correct }} dari {{ $questions->count() }} soal.</p><a class="btn btn-main" href="{{ route('leaderboard') }}">Lihat Leaderboard</a></div></div></section>
@endsection
