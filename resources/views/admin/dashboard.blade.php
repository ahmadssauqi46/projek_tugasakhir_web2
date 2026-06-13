@extends('admin.layout')
@section('admin')
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">Dashboard Admin/Guru</h2>
        <p class="muted mb-0">Kelola siswa, modul, soal, hasil quiz, hasil evaluasi, dan leaderboard.</p>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach([
        ['Total Siswa',$totalSiswa,'bi-people'],
        ['Total Modul',$totalModul,'bi-journal-text'],
        ['Total Soal',$totalSoal,'bi-ui-checks'],
        ['Quiz Selesai',$quizSelesai,'bi-patch-check'],
        ['Evaluasi Masuk',$evaluasiMasuk,'bi-clipboard-check'],
        ['Rata-rata Quiz',$rataQuiz,'bi-bar-chart'],
        ['Leaderboard','Aktif','bi-trophy']
    ] as $c)
        <div class="col-sm-6 col-xl-3">
            <div class="mini-stat">
                <div class="d-flex gap-3 align-items-center">
                    <div class="icon-box"><i class="bi {{ $c[2] }}"></i></div>
                    <div>
                        <div class="fw-bold fs-5 text-dark">{{ $c[1] }}</div>
                        <div class="small muted">{{ $c[0] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card-soft p-4 p-md-5">
    <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h5 class="fw-bold text-primary mb-1">Nilai Terbaru</h5>
            <p class="small muted mb-0">Data terbaru dari quiz dan evaluasi siswa.</p>
        </div>
        <a href="{{ route('admin.results.index') }}" class="btn btn-soft btn-sm">Lihat Semua</a>
    </div>

    @forelse($results as $r)
        <div class="data-row">
            <b>{{ $r->student_name ?: 'Siswa' }}</b>
            <span class="muted">— {{ $r->module?->title ?? 'Evaluasi Akhir' }} — {{ ucfirst($r->type) }} masuk — Nilai {{ $r->score }}</span>
        </div>
    @empty
        <div class="data-row"><b>Aulia Rahma</b><span class="muted"> — Quiz 86 — Evaluasi masuk</span></div>
        <div class="data-row"><b>Bima Pratama</b><span class="muted"> — Quiz 94 — Evaluasi masuk</span></div>
        <div class="data-row"><b>Citra Lestari</b><span class="muted"> — Quiz 90 — Belum evaluasi</span></div>
    @endforelse
</div>
@endsection
