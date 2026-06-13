@extends('admin.layout')
@section('admin')
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">Data Nilai</h2>
        <p class="muted mb-0">Daftar hasil quiz dan evaluasi yang tersimpan di database.</p>
    </div>
</div>

<div class="card-soft p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Modul</th>
                    <th>Nilai</th>
                    <th>Benar/Total</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $r)
                    <tr>
                        <td><b class="text-dark">{{ $r->student_name ?? '-' }}</b></td>
                        <td><span class="badge bg-primary">{{ ucfirst($r->type) }}</span></td>
                        <td>{{ $r->module->title ?? 'Evaluasi akhir' }}</td>
                        <td><b>{{ $r->score }}</b></td>
                        <td>{{ $r->correct_count }}/{{ $r->total_questions }}</td>
                        <td>{{ $r->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
