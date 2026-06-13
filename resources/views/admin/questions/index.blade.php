@extends('admin.layout')
@section('admin')
@php
    $title = match($type) {
        'latihan' => 'Soal Latihan',
        'quiz' => 'Soal Quiz',
        'evaluasi' => 'Soal Evaluasi',
        default => 'Data Soal'
    };
@endphp
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">{{ $title }}</h2>
        <p class="muted mb-0">Kelola pertanyaan, pilihan jawaban, kunci jawaban, dan pembahasan.</p>
    </div>
    <a href="{{ route('admin.questions.create', $type ? ['type'=>$type] : []) }}" class="btn btn-main"><i class="bi bi-plus-circle me-1"></i> Tambah Soal</a>
</div>

<div class="card-soft p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Modul</th>
                    <th>Pertanyaan</th>
                    <th>Kunci</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $q)
                    @php $cleanQuestion = preg_replace('/^\[[^\]]+\]\s*/', '', $q->question); @endphp
                    <tr>
                        <td><span class="badge bg-primary">{{ ucfirst($q->type) }}</span></td>
                        <td>{{ $q->module->title ?? 'Evaluasi Umum' }}</td>
                        <td>{{ Str::limit($cleanQuestion, 70) }}</td>
                        <td><span class="badge bg-success">{{ $q->correct_answer }}</span></td>
                        <td>
                            <a href="{{ route('admin.questions.edit', $q) }}" class="btn btn-sm btn-warning fw-bold">Edit</a>
                            <form method="POST" action="{{ route('admin.questions.destroy', $q) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger fw-bold" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
