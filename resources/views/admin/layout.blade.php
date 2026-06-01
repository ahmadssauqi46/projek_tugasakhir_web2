@extends('layouts.app')

@section('content')

<section class="section">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-3">

                <div class="card-soft p-3 admin-sidebar">

                    <h5 class="fw-bold p-2">
                        Panel Admin
                    </h5>

                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>

                    <a href="{{ route('admin.modules.index') }}">
                        Kelola Modul
                    </a>

                    <a href="{{ route('admin.questions.index') }}">
                        Kelola Soal
                    </a>

                    <a href="{{ route('admin.results.index') }}">
                        Hasil Belajar
                    </a>

                </div>

            </div>

            <div class="col-lg-9">

                @yield('admin')

            </div>

        </div>

    </div>

</section>
@endsection