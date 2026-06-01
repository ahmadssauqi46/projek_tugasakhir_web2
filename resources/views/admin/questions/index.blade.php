@extends('admin.layout')

@section('admin')

<div class="card-soft p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold mb-0">Data Soal</h2>

        <a href="{{ route('admin.questions.create') }}" class="btn btn-main">Tambah Soal</a>
    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Modul</th>
                    <th>Pertanyaan</th>
                    <th>Kunci</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($questions as $q)

                <tr>

                    <td>
                        <span class="badge bg-primary">
                        {{ ucfirst($q->type) }}</span>
                    </td>

                    <td>
                        {{ $q->module->title ?? 'Evaluasi Umum' }}
                    </td>

                    <td>
                        {{ Str::limit($q->question, 50) }}
                    </td>

                    <td>
                        <span class="badge bg-success">{{ $q->correct_answer }}</span>
                    </td>

                    <td>
                        <a href="{{ route('admin.questions.edit', $q) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form method="POST" action="{{ route('admin.questions.destroy', $q) }}" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus soal ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection