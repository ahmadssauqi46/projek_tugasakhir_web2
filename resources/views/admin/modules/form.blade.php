@extends('admin.layout')

@section('admin')

<div class="card-soft p-4">

<h2 class="fw-bold mb-4">
    {{ $module->exists ? 'Edit Modul' : 'Tambah Modul' }}
</h2>

<form
    method="POST"
    action="{{ $module->exists
        ? route('admin.modules.update', $module)
        : route('admin.modules.store') }}">

    @csrf

    @if($module->exists)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">
            Judul Modul
        </label>

        <input
            type="text"
            class="form-control"
            name="title"
            value="{{ old('title', $module->title) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Slug
        </label>

        <input
            type="text"
            class="form-control"
            name="slug"
            value="{{ old('slug', $module->slug) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">
            Ringkasan Materi
        </label>

        <textarea
            class="form-control"
            name="summary"
            rows="3">{{ old('summary', $module->summary) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Ikon
        </label>

        <input
            type="text"
            class="form-control"
            name="image"
            value="{{ old('image', $module->image) }}"
            placeholder="Contoh: 💻"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">
            Urutan Modul
        </label>

        <input
            type="number"
            class="form-control"
            name="order"
            value="{{ old('order', $module->order ?? 1) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Isi Materi
        </label>

        <textarea
            class="form-control"
            name="content"
            rows="10"
        >{{ old('content', $module->content) }}</textarea>

        <small class="text-muted">
            Isi materi dapat menggunakan format HTML sederhana.
        </small>
    </div>

    <div class="form-check mb-4">

        <input
            type="checkbox"
            class="form-check-input"
            id="is_active"
            name="is_active"
            value="1"
            {{ old('is_active', $module->is_active ?? true) ? 'checked' : '' }}
        >

        <label
            class="form-check-label"
            for="is_active">
            Modul Aktif
        </label>

    </div>

    <div class="d-flex gap-2">

        <button
            type="submit"
            class="btn btn-main">
            Simpan
        </button>

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-secondary">
            Batal
        </a>

    </div>

</form>
</div>

@endsection
