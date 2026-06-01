@extends('admin.layout')
@section('admin')

<div class="card-soft p-4"></div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold mb-0">
        Data Modul
    </h2>

    <a href="{{ route('admin.modules.create') }}"
       class="btn btn-main">
        Tambah
    </a>
</div>

<div class="table-responsive">
    <table class="table align-middle mt-3">

        <thead>
            <tr>
                <th>Urutan</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($modules as $m)
                <tr>
                    <td>
                        {{ $m->order }}
                    </td>

                    <td>
                        {{ $m->title }}
                    </td>

                    <td>
                        @if($m->is_active)
                            <span class="badge bg-success">
                                Aktif
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                Nonaktif
                            </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.modules.edit', $m) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('admin.modules.destroy', $m) }}"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus modul ini?')">
                                Hapus
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection