@extends('admin.layout')
@section('admin')
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">{{ $title }}</h2>
        <p class="muted mb-0">Halaman ini dapat dikembangkan menjadi CRUD sesuai kebutuhan proyek.</p>
    </div>
</div>

<div class="card-soft p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b class="text-dark">Contoh Data</b></td>
                    <td>Data awal untuk tampilan admin/guru</td>
                    <td><span class="badge bg-success">Aktif</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
