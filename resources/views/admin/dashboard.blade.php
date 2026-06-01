<h2 class="fw-bold mb-2">
    Dashboard Admin
</h2>

<p class="text-muted mb-4">
    Kelola modul pembelajaran, bank soal, dan hasil evaluasi siswa.
</p>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <h1 class="display-5 fw-bold text-primary">
                    {{ $modules }}
                </h1>

                <p class="mb-0">
                    Total Modul
                </p>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <h1 class="display-5 fw-bold text-success">
                    {{ $questions }}
                </h1>

                <p class="mb-0">
                    Total Soal
                </p>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">

                <h1 class="display-5 fw-bold text-warning">
                    {{ $results->count() }}
                </h1>

                <p class="mb-0">
                    Hasil Tersimpan
                </p>

            </div>
        </div>
    </div>

</div>

<div class="mt-5">

    <h4 class="fw-bold mb-3">
        Menu Cepat
    </h4>

    <div class="d-flex flex-wrap gap-2">

        <a href="{{ route('admin.modules.index') }}"
           class="btn btn-main">
            Kelola Modul
        </a>

        <a href="{{ route('admin.questions.index') }}"
           class="btn btn-outline-primary">
            Kelola Soal
        </a>

        <a href="{{ route('admin.results.index') }}"
           class="btn btn-outline-success">
            Lihat Hasil
        </a>

    </div>
</div>
@endsection