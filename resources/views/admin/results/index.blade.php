@extends('admin.layout')
@section('admin')
@php
    $results = $results ?? collect();
    $modules = $modules ?? collect();
    $summary = $summary ?? collect();
@endphp
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">Riwayat Nilai Siswa</h2>
        <p class="muted mb-0">Pantau riwayat nilai siswa per modul, tipe penilaian, dan nama siswa.</p>
    </div>
</div>

<div class="card-soft p-4 mb-4">
    <form method="GET" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label fw-bold small">Modul</label>
            <select class="form-select" name="module_id">
                <option value="">Semua modul</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ request('module_id') == $module->id ? 'selected' : '' }}>{{ $module->title }}</option>
                @endforeach
                <option value="evaluasi" {{ request('module_id') === 'evaluasi' ? 'selected' : '' }}>Evaluasi Akhir</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold small">Tipe</label>
            <select class="form-select" name="type">
                <option value="">Semua tipe</option>
                <option value="quiz" {{ request('type') === 'quiz' ? 'selected' : '' }}>Quiz</option>
                <option value="evaluasi" {{ request('type') === 'evaluasi' ? 'selected' : '' }}>Evaluasi</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-bold small">Nama / Email Siswa</label>
            <input class="form-control" name="student" value="{{ request('student') }}" placeholder="Cari siswa">
        </div>
        <div class="col-md-2 d-grid">
            <button class="btn btn-main" type="submit"><i class="bi bi-search me-1"></i> Filter</button>
        </div>
    </form>
</div>

<div class="row g-3 mb-4">
    @forelse($summary as $item)
        <div class="col-md-4">
            <div class="mini-stat h-100">
                <div class="fw-bold text-dark">{{ $item['module'] }}</div>
                <div class="small muted">{{ $item['count'] }} nilai | Rata-rata {{ $item['average'] }} | Tertinggi {{ $item['highest'] }}</div>
            </div>
        </div>
    @empty
        <div class="col-12"><div class="mini-stat"><span class="muted">Belum ada ringkasan nilai untuk filter ini.</span></div></div>
    @endforelse
</div>

<div class="card-soft p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead><tr><th>Nama</th><th>Email</th><th>Tipe</th><th>Modul</th><th>Nilai</th><th>Benar/Total</th><th>Waktu</th></tr></thead>
            <tbody>
                @forelse($results as $r)
                    <tr>
                        <td><b class="text-dark">{{ $r->user?->name ?? $r->student_name ?? '-' }}</b></td>
                        <td>{{ $r->user?->email ?? '-' }}</td>
                        <td><span class="badge bg-primary">{{ ucfirst($r->type) }}</span></td>
                        <td>{{ $r->module?->title ?? 'Evaluasi Akhir' }}</td>
                        <td><b>{{ $r->score }}</b></td>
                        <td>{{ $r->correct_count }}/{{ $r->total_questions }}</td>
                        <td>{{ $r->created_at?->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="muted">Belum ada riwayat nilai untuk filter ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection