@extends('admin.layout')
@section('admin')
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">{{ $title }}</h2>
        <p class="muted mb-0">Data siswa diambil langsung dari akun yang mendaftar.</p>
    </div>
</div>

<div class="card-soft p-4">
    @if(isset($students))
        @if($students->count() === 0)
            <div class="muted">Belum ada siswa yang mendaftar.</div>
        @else
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr><th>Nama</th><th>Email</th><th>Kelas</th><th>Terdaftar</th></tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td><b class="text-dark">{{ $student->name }}</b></td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->class ?? '-' }}</td>
                                <td>{{ $student->created_at?->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @else
        <div class="muted">Belum ada data untuk ditampilkan.</div>
    @endif
</div>
@endsection