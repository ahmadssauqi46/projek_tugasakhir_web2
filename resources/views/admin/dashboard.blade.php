@extends('layouts.app')

@section('content')
<section class="py-5 bg-light min-vh-100">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col-12 text-center text-md-start">
                <h2 class="fw-extrabold text-dark mb-2" style="letter-spacing: -0.5px;">
                    Dashboard Admin
                </h2>
                <p class="text-muted mb-0">
                    Kelola modul pembelajaran, bank soal, dan hasil evaluasi siswa secara real-time.
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 h-100 custom-dashboard-hover position-relative overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                            <span class="fs-4">🧩</span>
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2.5 py-1 small fw-bold">Active</span>
                    </div>
                    <h1 class="display-4 fw-extrabold text-dark mb-1">
                        {{ $modules }}
                    </h1>
                    <p class="text-secondary fw-medium mb-0">
                        Total Modul
                    </p>
                    <div class="card-decor bg-primary opacity-5 position-absolute" style="width: 100px; height: 100px; bottom: -30px; right: -30px; border-radius: 50px;"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 h-100 custom-dashboard-hover position-relative overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                            <span class="fs-4">📝</span>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2.5 py-1 small fw-bold">Bank Soal</span>
                    </div>
                    <h1 class="display-4 fw-extrabold text-dark mb-1">
                        {{ $questions }}
                    </h1>
                    <p class="text-secondary fw-medium mb-0">
                        Total Soal
                    </p>
                    <div class="card-decor bg-success opacity-5 position-absolute" style="width: 100px; height: 100px; bottom: -30px; right: -30px; border-radius: 50px;"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 h-100 custom-dashboard-hover position-relative overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning rounded-3 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                            <span class="fs-4">🎯</span>
                        </div>
                        <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-2.5 py-1 small fw-bold">Database</span>
                    </div>
                    <h1 class="display-4 fw-extrabold text-dark mb-1">
                        {{ $results->count() }}
                    </h1>
                    <p class="text-secondary fw-medium mb-0">
                        Hasil Tersimpan
                    </p>
                    <div class="card-decor bg-warning opacity-5 position-absolute" style="width: 100px; height: 100px; bottom: -30px; right: -30px; border-radius: 50px;"></div>
                </div>
            </div>

        </div>

        <div class="row mt-5 pt-2">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span class="fs-4 text-primary bg-primary bg-opacity-10 px-2.5 py-1.5 rounded-3">⚙️</span>
                        <h4 class="fw-bold text-dark mb-0">
                            Aksi & Menu Cepat
                        </h4>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('admin.modules.index') }}"
                               class="btn btn-indigo w-100 py-3 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2 shadow-sm transition-all">
                                📂 Kelola Modul Pembelajaran
                            </a>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('admin.questions.index') }}"
                               class="btn btn-outline-indigo w-100 py-3 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2 transition-all">
                                📝 Kelola Bank Soal
                            </a>
                        </div>

                        <div class="col-12 col-sm-12 col-md-4">
                            <a href="{{ route('admin.results.index') }}"
                               class="btn btn-outline-success w-100 py-3 rounded-3 fw-bold d-flex align-items-center justify-content-center gap-2 transition-all">
                                📊 Lihat Hasil Evaluasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .fw-extrabold { font-weight: 800; }
    
    .btn-indigo {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: #ffffff !important;
        border: none;
    }
    .btn-indigo:hover {
        background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3) !important;
    }

    .btn-outline-indigo {
        color: #4f46e5 !important;
        border: 2px solid #4f46e5;
        background-color: transparent;
    }
    .btn-outline-indigo:hover {
        background-color: #4f46e5;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.15) !important;
    }

    .btn-outline-success {
        border: 2px solid #198754;
        font-weight: 700;
    }
    .btn-outline-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(25, 135, 84, 0.15) !important;
    }

    .transition-all {
        transition: all 0.25s ease-in-out;
    }

    .custom-dashboard-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-dashboard-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.05) !important;
    }
</style>
@endsection