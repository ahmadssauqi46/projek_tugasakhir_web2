@extends('admin.layout')
@section('admin')
<div class="page-title">
    <div>
        <h2 class="fw-bold mb-1">Data Modul</h2>
        <p class="muted mb-0">Kelola urutan, judul, ringkasan, ikon, dan isi materi pembelajaran.</p>
    </div>
    <a href="{{ route('admin.modules.create') }}" class="btn btn-main"><i class="bi bi-plus-circle me-1"></i> Tambah Modul</a>
</div>

<div class="card-soft p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Judul Modul</th>
                    <th>Ringkasan</th>
                    <th>Status</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $m)
                    <tr>
                        <td><b>{{ $m->order }}</b></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="icon-box" style="width:38px;height:38px;font-size:18px"><i class="bi {{ $m->image ?: 'bi-cpu' }}"></i></span>
                                <b class="text-dark">{{ $m->title }}</b>
                            </div>
                        </td>
                        <td>{{ Str::limit($m->summary, 80) }}</td>
                        <td>
                            @if($m->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.modules.edit', $m) }}" class="btn btn-sm btn-warning fw-bold">Edit</a>
                            <form method="POST" action="{{ route('admin.modules.destroy', $m) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger fw-bold" onclick="return confirm('Hapus modul ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
