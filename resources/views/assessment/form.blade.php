@extends('layouts.app')

@section('content')

<section class="hero text-center">
    <div class="container">

        <h1 class="fw-bold">
            {{ $mode == 'quiz' ? 'Quiz '.$module->title : 'Evaluasi Akhir' }}
        </h1>

    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <form class="card-soft p-4"
                      method="POST"
                      action="{{ $mode == 'quiz'
                                ? route('quiz.submit', $module)
                                : route('evaluasi.submit') }}">

                    @csrf

                    <label class="fw-bold mb-2">
                        Nama Siswa
                    </label>

                    <input
                        class="form-control mb-4"
                        name="student_name"
                        placeholder="Masukkan nama"
                        required>

                    @foreach($questions as $q)

                        <div class="mb-4">

                            <h6 class="fw-bold">
                                {{ $loop->iteration }}.
                                {{ $q->question }}
                            </h6>

                            @foreach(['A'=>'option_a','B'=>'option_b','C'=>'option_c','D'=>'option_d'] as $key => $field)

                                <label class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="answers[{{ $q->id }}]"
                                        value="{{ $key }}"
                                        required>

                                    {{ $key }}.
                                    {{ $q->$field }}
                                </label>

                            @endforeach

                        </div>

                    @endforeach

                    <button class="btn btn-main w-100">
                        Kirim {{ ucfirst($mode) }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</section>
@endsection