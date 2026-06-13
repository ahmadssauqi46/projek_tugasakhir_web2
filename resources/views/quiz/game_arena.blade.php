@extends('layouts.app')

@section('title', 'Simulasi Interaktif')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3">
                <i class="bi bi-controller"></i>
                Simulasi Interaktif
            </span>

            <h2 class="fw-bold mb-2">
                Simulasi Hardware dan Software
            </h2>

            <p class="muted mb-0">
                Simulasi ini membantu siswa memahami komponen hardware dan jenis software sebelum mengerjakan kuis.
            </p>
        </div>

        <div class="card-soft p-4 p-md-5">
            <div class="simulation-tabs">
                <button class="simulation-tab active" id="tabHardware" type="button" onclick="showSimulation('hardware')">
                    <i class="bi bi-cpu me-1"></i>
                    Simulasi Hardware
                </button>

                <button class="simulation-tab" id="tabSoftware" type="button" onclick="showSimulation('software')">
                    <i class="bi bi-window-stack me-1"></i>
                    Simulasi Software
                </button>
            </div>

            <div id="simulationHardware" class="simulation-content">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h4 class="fw-bold text-primary mb-1">
                            Susun Komponen Komputer
                        </h4>

                        <p class="text-muted mb-0 small">
                            Tarik komponen ke posisi yang benar di dalam casing komputer.
                        </p>
                    </div>

                    <a href="{{ route('quiz.index') }}" class="btn btn-main btn-sm">
                        Lanjut ke Kuis
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">
                            Pilihan Komponen
                        </h6>

                        <div class="d-flex flex-column gap-2">
                            <div class="simulation-item" draggable="true" id="compCpu">
                                Prosesor CPU
                            </div>

                            <div class="simulation-item" draggable="true" id="compRam">
                                RAM Memory
                            </div>

                            <div class="simulation-item" draggable="true" id="compPsu">
                                Power Supply
                            </div>
                        </div>

                        <div class="alert alert-success mt-4 d-none" id="hardwareSuccess">
                            <b>Selamat!</b> Semua komponen hardware sudah ditempatkan dengan benar.
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="computer-case">
                            <h6 class="text-center text-white-50 fw-bold mb-4">
                                BAGIAN DALAM CASING KOMPUTER
                            </h6>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white-50 small">
                                        Socket Motherboard
                                    </label>

                                    <div class="drop-zone hardware-zone" data-target="compCpu">
                                        Letakkan CPU di sini
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-white-50 small">
                                        Slot RAM
                                    </label>

                                    <div class="drop-zone hardware-zone" data-target="compRam">
                                        Letakkan RAM di sini
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-white-50 small">
                                        Dudukan Bawah Casing
                                    </label>

                                    <div class="drop-zone hardware-zone" data-target="compPsu">
                                        Letakkan Power Supply di sini
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4 text-white-50 small">
                                Status:
                                <span id="hardwareStatus" class="text-warning">
                                    Menunggu komponen diletakkan...
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="simulationSoftware" class="simulation-content d-none">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div>
                        <h4 class="fw-bold text-primary mb-1">
                            Klasifikasi Software
                        </h4>

                        <p class="text-muted mb-0 small">
                            Tarik software ke kategori yang sesuai.
                        </p>
                    </div>

                    <a href="{{ route('quiz.index') }}" class="btn btn-main btn-sm">
                        Lanjut ke Kuis
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">
                            Daftar Software
                        </h6>

                        <div class="d-flex flex-column gap-2">
                            <div class="simulation-item" draggable="true" id="softwareWindows" data-type="os">
                                Windows 11
                            </div>

                            <div class="simulation-item" draggable="true" id="softwareLinux" data-type="os">
                                Linux Ubuntu
                            </div>

                            <div class="simulation-item" draggable="true" id="softwareChrome" data-type="app">
                                Google Chrome
                            </div>

                            <div class="simulation-item" draggable="true" id="softwareWord" data-type="app">
                                Microsoft Word
                            </div>
                        </div>

                        <div class="alert alert-success mt-4 d-none" id="softwareSuccess">
                            <b>Hebat!</b> Semua software sudah dikelompokkan dengan benar.
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="software-box software-zone" data-accept="os">
                                    <h6 class="text-center fw-bold text-info">
                                        Sistem Operasi
                                    </h6>

                                    <hr class="border-secondary">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="software-box software-zone" data-accept="app">
                                    <h6 class="text-center fw-bold text-warning">
                                        Software Aplikasi
                                    </h6>

                                    <hr class="border-secondary">
                                </div>
                            </div>
                        </div>

                        <p class="text-center mt-4 text-muted small" id="softwareStatus">
                            Tarik software ke kotak kategori yang sesuai.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('materi.index') }}" class="btn btn-soft">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Materi
            </a>

            <a href="{{ route('quiz.index') }}" class="btn btn-main ms-2">
                Lanjut ke Kuis
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .simulation-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 18px;
        margin-bottom: 28px;
        border-bottom: 1px solid #e5e7eb;
    }

    .simulation-tab {
        border: none;
        background: #eef2ff;
        color: #475569;
        padding: 10px 18px;
        border-radius: 14px;
        font-weight: 700;
        transition: 0.2s;
    }

    .simulation-tab.active,
    .simulation-tab:hover {
        background: #2563eb;
        color: #ffffff;
    }

    .simulation-item {
        background: #eef2ff;
        border: 2px dashed #2563eb;
        border-radius: 14px;
        padding: 12px;
        text-align: center;
        cursor: grab;
        font-weight: 700;
        color: #1e3a8a;
        transition: 0.2s;
    }

    .simulation-item:hover {
        background: #dbeafe;
        transform: translateY(-1px);
    }

    .simulation-item:active {
        cursor: grabbing;
    }

    .computer-case {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 22px;
        min-height: 430px;
        padding: 24px;
        color: #ffffff;
    }

    .drop-zone {
        border: 2px dashed rgba(255, 255, 255, 0.4);
        border-radius: 14px;
        height: 95px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.75);
        text-align: center;
        padding: 10px;
        transition: 0.2s;
    }

    .drop-zone.hovered {
        background: rgba(37, 99, 235, 0.28);
        border-color: #60a5fa;
        color: #ffffff;
    }

    .drop-zone.correct {
        background: rgba(22, 163, 74, 0.18);
        border-color: #22c55e;
        color: #86efac;
        border-style: solid;
        font-weight: 700;
    }

    .software-box {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border-radius: 18px;
        min-height: 230px;
        padding: 20px;
        color: #ffffff;
        border: 2px dashed rgba(255, 255, 255, 0.2);
        transition: 0.2s;
    }

    .software-box.hovered {
        border-color: #60a5fa;
        background: #1e293b;
    }

    .software-item-added {
        background: rgba(255, 255, 255, 0.1);
        padding: 9px;
        margin-top: 10px;
        border-radius: 10px;
        font-size: 14px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @media (max-width: 576px) {
        .simulation-tab {
            width: 100%;
        }
    }
</style>

<script>
    function showSimulation(type) {
        const hardwareContent = document.getElementById('simulationHardware');
        const softwareContent = document.getElementById('simulationSoftware');
        const tabHardware = document.getElementById('tabHardware');
        const tabSoftware = document.getElementById('tabSoftware');

        hardwareContent.classList.add('d-none');
        softwareContent.classList.add('d-none');
        tabHardware.classList.remove('active');
        tabSoftware.classList.remove('active');

        if (type === 'hardware') {
            hardwareContent.classList.remove('d-none');
            tabHardware.classList.add('active');
        }

        if (type === 'software') {
            softwareContent.classList.remove('d-none');
            tabSoftware.classList.add('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.simulation-item').forEach(function (item) {
            item.addEventListener('dragstart', function (event) {
                event.dataTransfer.setData('text/plain', event.target.id);
            });
        });

        let hardwareCorrect = 0;
        const hardwareStatus = document.getElementById('hardwareStatus');
        const hardwareSuccess = document.getElementById('hardwareSuccess');

        document.querySelectorAll('.hardware-zone').forEach(function (zone) {
            zone.addEventListener('dragover', function (event) {
                event.preventDefault();
                zone.classList.add('hovered');
            });

            zone.addEventListener('dragleave', function () {
                zone.classList.remove('hovered');
            });

            zone.addEventListener('drop', function (event) {
                event.preventDefault();
                zone.classList.remove('hovered');

                const itemId = event.dataTransfer.getData('text/plain');
                const targetId = zone.getAttribute('data-target');
                const item = document.getElementById(itemId);

                if (!item) {
                    return;
                }

                if (itemId === targetId) {
                    zone.classList.add('correct');
                    zone.innerHTML = 'Benar: ' + item.innerText;
                    item.remove();

                    hardwareCorrect++;
                    hardwareStatus.innerText = 'Komponen sudah tepat.';
                    hardwareStatus.className = 'text-success';

                    if (hardwareCorrect === 3) {
                        hardwareStatus.innerText = 'Selesai.';
                        hardwareSuccess.classList.remove('d-none');
                    }
                } else {
                    hardwareStatus.innerText = 'Posisi komponen belum tepat. Coba lagi.';
                    hardwareStatus.className = 'text-danger';
                }
            });
        });

        let softwareCorrect = 0;
        const softwareStatus = document.getElementById('softwareStatus');
        const softwareSuccess = document.getElementById('softwareSuccess');

        document.querySelectorAll('.software-zone').forEach(function (zone) {
            zone.addEventListener('dragover', function (event) {
                event.preventDefault();
                zone.classList.add('hovered');
            });

            zone.addEventListener('dragleave', function () {
                zone.classList.remove('hovered');
            });

            zone.addEventListener('drop', function (event) {
                event.preventDefault();
                zone.classList.remove('hovered');

                const itemId = event.dataTransfer.getData('text/plain');
                const item = document.getElementById(itemId);

                if (!item) {
                    return;
                }

                if (item.getAttribute('data-type') === zone.getAttribute('data-accept')) {
                    const addedItem = document.createElement('div');
                    addedItem.className = 'software-item-added';
                    addedItem.innerText = item.innerText;

                    zone.appendChild(addedItem);
                    item.remove();

                    softwareCorrect++;
                    softwareStatus.innerText = 'Kategori sudah tepat.';
                    softwareStatus.className = 'text-center mt-4 text-success fw-bold';

                    if (softwareCorrect === 4) {
                        softwareStatus.innerText = 'Selesai.';
                        softwareSuccess.classList.remove('d-none');
                    }
                } else {
                    softwareStatus.innerText = 'Kategori belum tepat. Coba lagi.';
                    softwareStatus.className = 'text-center mt-4 text-danger small';
                }
            });
        });
    });
</script>
@endsection