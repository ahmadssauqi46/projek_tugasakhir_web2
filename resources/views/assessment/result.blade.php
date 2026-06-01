@extends('layouts.app')
@section('content')

<section class="section">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card-soft p-5 text-center">

                    <div class="display-1">
                        🎉
                    </div>

                    <h2 class="fw-bold">
                        Quiz {{ $module->title }} Selesai
                    </h2>

                    <h1 class="display-3 fw-bold text-primary my-4">
                        {{ $score }}
                    </h1>

                    <p class="text-muted">
                        Jawaban benar: {{ $correct }} / {{ $questions->count() }}
                    </p>

                    <a href="{{ route('quiz.index') }}"
                       class="btn btn-main mt-3">
                        Kembali ke Quiz
                    </a>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection