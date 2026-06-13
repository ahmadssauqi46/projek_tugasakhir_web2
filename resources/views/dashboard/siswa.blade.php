@extends('layouts.app')
@section('content')
@php
    $name = $name ?? session('user_name', 'Siswa');
    $class = $class ?? session('user_class', 'Belum diisi');
    $progress = $progress ?? 0;
    $done = $done ?? 0;
    $totalModules = $totalModules ?? 0;
    $locked = $locked ?? max(0, $totalModules - $done);
    $quizScore = $quizScore ?? 0;
    $evaluasi = $evaluasi ?? 'Belum';
    $points = $points ?? 0;
    $rank = $rank ?? '-';
    $next = $next ?? null;
    $moduleStatuses = $moduleStatuses ?? collect();
@endphp
<section class="section">
    <div class="container">
        <div class="section-heading d-flex flex-column flex-md-row justify-content-between align-items-md-start gap-3">
            <div><span class="chip mb-3"><i class="bi bi-person-circle"></i> Dashboard Siswa</span><h2 class="fw-bold mb-2">Halo, {{ $name }}</h2><p class="muted mb-0">Kelas {{ $class }}. Pantau progress belajar, nilai quiz, evaluasi, poin, dan ranking kamu.</p></div>
            <div class="d-flex flex-wrap gap-2"><a href="{{ route('profile.edit') }}" class="btn btn-soft"><i class="bi bi-person-gear me-1"></i> Profil</a><form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-soft" type="submit"><i class="bi bi-box-arrow-right me-1"></i> Logout</button></form></div>
        </div>
        <div class="card-soft p-4 p-md-5 mb-4"><div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-3"><div><h5 class="fw-bold mb-1">Progress Belajar</h5><p class="small muted mb-0">{{ $done }} dari {{ $totalModules }} materi sudah diselesaikan.</p></div><div class="display-5 fw-bold text-primary">{{ $progress }}%</div></div><div class="progress" style="height:16px;"><div class="progress-bar" style="width:{{ $progress }}%">{{ $progress }}%</div></div></div>
        <div class="row g-3 mb-4">@foreach([['Materi selesai '.$done.'/'.$totalModules,'bi-cpu'], ['Materi terkunci '.$locked,'bi-lock'], ['Rata-rata quiz '.$quizScore,'bi-award'], ['Evaluasi '.$evaluasi,'bi-clipboard-check'], ['Poin '.$points,'bi-stars'], ['Leaderboard #'.$rank,'bi-trophy']] as $c)<div class="col-md-4 col-6"><div class="mini-card h-100"><div class="d-flex align-items-center gap-3"><div class="icon-box"><i class="bi {{ $c[1] }}"></i></div><b>{{ $c[0] }}</b></div></div></div>@endforeach</div>
        <div class="row g-4"><div class="col-lg-8"><div class="card-soft p-4 p-md-5 h-100"><h5 class="fw-bold mb-3">Status Materi</h5><div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Materi</th><th>Latihan</th><th>Quiz</th><th>Status</th></tr></thead><tbody>@forelse($moduleStatuses as $row)<tr><td><b>{{ $row['module']->title }}</b></td><td>{{ $row['latihanDone'] ? 'Selesai' : 'Belum' }}</td><td>{{ $row['quizScore'] === null ? 'Belum' : $row['quizScore'] }}</td><td><span class="badge {{ $row['status'] === 'Lulus' ? 'status-done' : ($row['status'] === 'Sedang belajar' ? 'status-open' : 'status-lock') }}">{{ $row['status'] }}</span></td></tr>@empty<tr><td colspan="4" class="muted">Belum ada materi aktif.</td></tr>@endforelse</tbody></table></div></div></div><div class="col-lg-4"><div class="card-soft p-4 p-md-5 h-100"><div class="icon-box mb-3"><i class="bi bi-arrow-right-circle"></i></div><h5 class="fw-bold">Lanjutkan Belajar</h5><p class="muted">{{ $next?->title ?? 'Semua materi sudah selesai' }}</p><a class="btn btn-main" href="{{ $next ? route('materi.show',$next) : route('materi.index') }}">Buka Materi</a></div></div></div>
    </div>
</section>
@endsection