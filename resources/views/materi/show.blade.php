@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-white text-primary mb-3">
                    Modul {{ $module->order }}
                </span>

                <h1 class="fw-bold">
                    {{ $module->title }}
                </h1>

                <p class="lead">
                    {{ $module->summary }}
                </p>

            </div>

            <div class="col-lg-4">
                <div class="illus">
                    {{ $module->image }}
                </div>
            </div>

        </div>

    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row g-4">

            <div class="col-lg-8">

                <div class="card-soft p-5 mb-4">
                    {!! $module->content !!}
                </div>

                <div class="card-soft p-4">

                    <h3 class="fw-bold">
                        Latihan Modul
                    </h3>

                    @if(session('latihan_result'))

                        @php
                            $r = session('latihan_result');
                        @endphp

                        <div class="alert alert-info">

                            <b>Hasil Latihan</b><br>

                            Jawaban benar:
                            {{ $r['correct'] }}
                            dari
                            {{ session('total') }}
                            soal.

                            <br>

                            Nilai:
                            {{ $r['score'] }}

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('latihan.submit', $module) }}">

                        @csrf

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

                        <button class="btn btn-main">
                            Periksa Latihan
                        </button>

                    </form>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card-soft p-4 sticky-top"
                     style="top:90px">

                    <h5 class="fw-bold">
                        Alur Pembelajaran
                    </h5>

                    <ol>
                        <li>Baca materi</li>
                        <li>Kerjakan latihan</li>
                        <li>Lanjut ke modul berikutnya</li>
                        <li>Kerjakan quiz</li>
                        <li>Ikuti evaluasi akhir</li>
                    </ol>

                    <a href="{{ route('materi.index') }}"
                       class="btn btn-soft w-100 mb-2">
                        Kembali ke Materi
                    </a>

                    <a href="{{ route('quiz.show', $module) }}"
                       class="btn btn-main w-100">
                        Quiz Modul
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection