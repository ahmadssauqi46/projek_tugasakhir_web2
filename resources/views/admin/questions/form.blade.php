@extends('admin.layout')

@section('admin')

<div class="card-soft p-4">

<h2 class="fw-bold mb-4">
    {{ $question->exists ? 'Edit Soal' : 'Tambah Soal' }}
</h2>

<form
    method="POST"
    action="{{ $question->exists
        ? route('admin.questions.update', $question)
        : route('admin.questions.store') }}">

    @csrf

    @if($question->exists)
        @method('PUT')
    @endif

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Modul
            </label>

            <select class="form-control" name="module_id">
                <option value="">
                    Evaluasi Umum
                </option>

                @foreach($modules as $m)
                    <option
                        value="{{ $m->id }}"
                        @selected(old('module_id', $question->module_id) == $m->id)>
                        {{ $m->title }}
                    </option>
                @endforeach

            </select>

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Tipe Soal
            </label>

            <select class="form-control" name="type">

                @foreach(['latihan', 'quiz', 'evaluasi'] as $t)
                    <option
                        value="{{ $t }}"
                        @selected(old('type', $question->type) == $t)>
                        {{ ucfirst($t) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">

        <label class="form-label">
            Pertanyaan
        </label>

        <textarea
            class="form-control"
            name="question"
            rows="3"
            required>{{ old('question', $question->question) }}</textarea>

    </div>

    <div class="mb-3">
        <label class="form-label">
            Opsi A
        </label>

        <input
            type="text"
            class="form-control"
            name="option_a"
            value="{{ old('option_a', $question->option_a) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Opsi B
        </label>

        <input
            type="text"
            class="form-control"
            name="option_b"
            value="{{ old('option_b', $question->option_b) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Opsi C
        </label>

        <input
            type="text"
            class="form-control"
            name="option_c"
            value="{{ old('option_c', $question->option_c) }}"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">
            Opsi D
        </label>

        <input
            type="text"
            class="form-control"
            name="option_d"
            value="{{ old('option_d', $question->option_d) }}"
            required>
    </div>

    <div class="mb-3">

        <label class="form-label">
            Kunci Jawaban
        </label>

        <select
            class="form-control"
            name="correct_answer">

            @foreach(['A', 'B', 'C', 'D'] as $a)
                <option
                    value="{{ $a }}"
                    @selected(old('correct_answer', $question->correct_answer) == $a)>
                    {{ $a }}
                </option>
            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="form-label">
            Pembahasan
        </label>

        <textarea
            class="form-control"
            name="explanation"
            rows="4">{{ old('explanation', $question->explanation) }}</textarea>

    </div>

    <div class="d-flex gap-2">

        <button
            type="submit"
            class="btn btn-main">
            Simpan
        </button>

        <a
            href="{{ route('admin.questions.index') }}"
            class="btn btn-secondary">
            Batal
        </a>

    </div>

</form>
</div>

@endsection
