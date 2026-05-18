<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Game Praktik - EduGame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f5f7ff; padding-top: 40px; }
        .game-card { background: white; border-radius: 20px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
        .component-box { background: #eef2ff; border: 2px dashed #4f46e5; border-radius: 12px; padding: 12px; text-align: center; cursor: grab; font-weight: 500; transition: 0.3s; }
        .component-box:active { cursor: grabbing; }
        .casing-area { background: #1e1e2f; border-radius: 20px; min-height: 450px; position: relative; padding: 20px; color: white; }
        .drop-zone { border: 2px dashed rgba(255, 255, 255, 0.4); border-radius: 10px; height: 90px; display: flex; align-items: center; justify-content: center; background: rgba(255, 255, 255, 0.05); transition: 0.3s; font-size: 14px; color: rgba(255, 255, 255, 0.6); }
        .drop-zone.hovered { background: rgba(79, 70, 229, 0.3); border-color: #4f46e5; color: white; }
        .drop-zone.correct { background: rgba(22, 163, 74, 0.2); border-color: #16a34a; color: #22c55e; border-style: solid; }
        .drop-box-software { background: #1e1e2f; border-radius: 16px; min-height: 220px; padding: 20px; color: white; transition: 0.3s; border: 2px dashed rgba(255,255,255,0.2); }
        .drop-box-software.hovered { border-color: #6366f1; background: #252538; }
        .item-in-box { background: rgba(255,255,255,0.1); padding: 8px; margin-top: 10px; border-radius: 8px; font-size: 14px; text-align: center; border: 1px solid rgba(255,255,255,0.2); }
        .definition-zone { background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 12px; padding: 20px; min-height: 80px; display: flex; align-items: center; justify-content: center; font-weight: 500; transition: 0.3s; }
        .definition-zone.hovered { background: #e0e7ff; border-color: #6366f1; }
        .definition-zone.correct { background: #dcfce7; border-color: #22c55e; color: #15803d; border-style: solid; }
        .game-nav-box { border-bottom: 2px solid #f3f4f6; margin-bottom: 30px; padding-bottom: 15px; }
        .nav-tab-btn { border: none; background: none; padding: 10px 20px; font-weight: 600; color: #9ca3af; border-bottom: 3px solid transparent; transition: 0.2s; }
        .nav-tab-btn.active { color: #4f46e5; border-bottom-color: #4f46e5; }
    </style>
</head>
<body>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="game-card">
                    
                    <div class="d-flex gap-2 game-nav-box">
                        <button class="nav-tab-btn" id="tab-hw-btn" onclick="switchGameLevel('hardware')">💻 Game Hardware</button>
                        <button class="nav-tab-btn" id="tab-sw-btn" onclick="switchGameLevel('software')">⚙️ Game Software</button>
                        <button class="nav-tab-btn" id="tab-net-btn" onclick="switchGameLevel('jaringan')">🌐 Game Jaringan</button>
                    </div>

                    <div id="game-hardware-content" class="game-level-view d-none">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="fw-bold text-primary mb-1">⚡ Level 1: Susun Komputer</h4>
                                <p class="text-muted mb-0 small">Geser komponen di sebelah kiri ke posisi yang benar di dalam Casing!</p>
                            </div>
                            <a href="{{ url('/quiz') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold mb-3 small">Pilihan Komponen</h6>
                                <div class="d-flex flex-column gap-2">
                                    <div class="component-box" draggable="true" id="comp-ram">🧠 RAM Memory</div>
                                    <div class="component-box" draggable="true" id="comp-cpu">⚡ Prosesor (CPU)</div>
                                    <div class="component-box" draggable="true" id="comp-psu">🔌 Power Supply</div>
                                </div>
                                <div class="alert alert-success mt-4 d-none hw-win-message">🎉 <b>Selamat!</b> Perakitan PC Selesai!</div>
                            </div>
                            <div class="col-md-8">
                                <div class="casing-area d-flex flex-column justify-content-between">
                                    <h6 class="text-center fw-bold text-white-50 small">BAGIAN DALAM CASING PC</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="form-label text-white-50 small">Socket Motherboard:</label>
                                            <div class="drop-zone hw-zone" data-target="comp-cpu">Drop CPU di Sini</div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label text-white-50 small">Slot RAM (DDR):</label>
                                            <div class="drop-zone hw-zone" data-target="comp-ram">Drop RAM di Sini</div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label text-white-50 small">Dudukan Bawah Casing:</label>
                                            <div class="drop-zone hw-zone" data-target="comp-psu">Drop Power Supply di Sini</div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3 text-white-50 small">
                                        Status: <span id="hw-game-status" class="text-warning">Menunggu komponen diletakkan...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="game-software-content" class="game-level-view d-none">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="fw-bold text-primary mb-1">⚙️ Level 2: Sortir Kategori Software</h4>
                                <p class="text-muted small mb-0">Klasifikasikan program ke dalam kelompok Sistem Operasi atau Aplikasi yang tepat!</p>
                            </div>
                            <a href="{{ url('/quiz') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4">
                                <h6 class="fw-bold mb-3 small">Daftar Software</h6>
                                <div class="d-flex flex-column gap-2">
                                    <div class="component-box" draggable="true" id="item-win" data-type="os">🪟 Windows 11</div>
                                    <div class="component-box" draggable="true" id="item-chrome" data-type="app">🌐 Google Chrome</div>
                                    <div class="component-box" draggable="true" id="item-linux" data-type="os">🐧 Linux Ubuntu</div>
                                    <div class="component-box" draggable="true" id="item-word" data-type="app">📄 Microsoft Word</div>
                                </div>
                                <div class="alert alert-success mt-4 d-none sw-win-message">🎉 Hebat! Semua kategori software benar!</div>
                            </div>
                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="drop-box-software sw-zone" data-accept="os">
                                            <h6 class="text-center fw-bold text-info small">Sistem Operasi (OS)</h6>
                                            <hr class="border-secondary my-2">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="drop-box-software sw-zone" data-accept="app">
                                            <h6 class="text-center fw-bold text-warning small">Software Aplikasi</h6>
                                            <hr class="border-secondary my-2">
                                        </div>
                                    </div>
                                </div>
                                <p class="text-center mt-4 text-muted small" id="sw-game-status">Tarik item ke dalam kotak kategori...</p>
                            </div>
                        </div>
                    </div>

                    <div id="game-jaringan-content" class="game-level-view d-none">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="fw-bold text-primary mb-1">🌐 Level 3: Istilah & Definisi Jaringan</h4>
                                <p class="text-muted small mb-0">Pasangkan singkatan jaringan di sebelah kiri ke definisi yang tepat di sebelah kanan!</p>
                            </div>
                            <a href="{{ url('/quiz') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        </div>

                        <div class="row g-4 align-items-center">
                            <div class="col-md-4 d-flex flex-column gap-3">
                                <div class="component-box" draggable="true" id="lan">LAN</div>
                                <div class="component-box" draggable="true" id="wan">WAN</div>
                                <div class="component-box" draggable="true" id="wlan">WLAN</div>
                            </div>
                            <div class="col-md-8 d-flex flex-column gap-3">
                                <div class="definition-zone net-zone" data-target="lan">Jaringan lokal terbatas dalam satu ruangan atau gedung rumah/kantor</div>
                                <div class="definition-zone net-zone" data-target="wan">Jaringan skala geografis luas yang menghubungkan antar negara/benua</div>
                                <div class="definition-zone net-zone" data-target="wlan">Jaringan lokal nirkabel menggunakan media transmisi gelombang radio/Wi-Fi</div>
                            </div>
                        </div>
                        <div class="alert alert-success mt-4 d-none text-center net-win-message">🎉 Luar biasa! Seluruh misi game selesai dikerjakan!</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function switchGameLevel(level) {
            document.querySelectorAll('.game-level-view').forEach(view => view.classList.add('d-none'));
            document.querySelectorAll('.nav-tab-btn').forEach(btn => btn.classList.remove('active'));

            if (level === 'hardware') {
                document.getElementById('game-hardware-content').classList.remove('d-none');
                document.getElementById('tab-hw-btn').classList.add('active');
            } else if (level === 'software') {
                document.getElementById('game-software-content').classList.remove('d-none');
                document.getElementById('tab-sw-btn').classList.add('active');
            } else if (level === 'jaringan') {
                document.getElementById('game-jaringan-content').classList.remove('d-none');
                document.getElementById('tab-net-btn').classList.add('active');
            }
        }

        // Baca otomatis level aktif dari parameter URL data tombol halaman utama
        window.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const initialLevel = urlParams.get('level') || 'hardware';
            switchGameLevel(initialLevel);
        });

        // Event Drag global
        const allDraggables = document.querySelectorAll('.component-box');
        allDraggables.forEach(item => {
            item.addEventListener('dragstart', (e) => { e.dataTransfer.setData('text/plain', e.target.id); });
        });

        // LOGIK MINI GAME LEVEL 1 (HARDWARE)
        const hwZones = document.querySelectorAll('.hw-zone');
        const hwStatus = document.getElementById('hw-game-status');
        const hwWin = document.querySelector('.hw-win-message');
        let hwCount = 0;

        hwZones.forEach(zone => {
            zone.addEventListener('dragover', (e) => { e.preventDefault(); zone.classList.add('hovered'); });
            zone.addEventListener('dragleave', () => zone.classList.remove('hovered'));
            zone.addEventListener('drop', (e) => {
                e.preventDefault();
                zone.classList.remove('hovered');
                const id = e.dataTransfer.getData('text/plain');
                const targetId = zone.getAttribute('data-target');
                const el = document.getElementById(id);

                if (id === targetId) {
                    zone.classList.add('correct');
                    zone.innerHTML = `✅ ${el.innerText}`;
                    el.remove();
                    hwStatus.innerText = "Komponen terpasang dengan benar!";
                    hwStatus.className = "text-success";
                    hwCount++;
                    if (hwCount === 3) { hwStatus.innerText = "Selesai!"; hwWin.classList.remove('d-none'); }
                } else {
                    hwStatus.innerText = "Ups! Posisi komponen fisik salah, coba lagi.";
                    hwStatus.className = "text-danger";
                }
            });
        });

        // LOGIK MINI GAME LEVEL 2 (SOFTWARE)
        const swZones = document.querySelectorAll('.sw-zone');
        const swStatus = document.getElementById('sw-game-status');
        const swWin = document.querySelector('.sw-win-message');
        let swCount = 0;

        swZones.forEach(box => {
            box.addEventListener('dragover', (e) => { e.preventDefault(); box.classList.add('hovered'); });
            box.addEventListener('dragleave', () => box.classList.remove('hovered'));
            box.addEventListener('drop', (e) => {
                e.preventDefault();
                box.classList.remove('hovered');
                const id = e.dataTransfer.getData('text/plain');
                const el = document.getElementById(id);

                if (el && el.getAttribute('data-type') === box.getAttribute('data-accept')) {
                    const typedEl = document.createElement('div');
                    typedEl.className = 'item-in-box';
                    typedEl.innerText = el.innerText;
                    box.appendChild(typedEl);
                    el.remove();
                    swStatus.innerText = "Kombinasi kategori tepat!";
                    swStatus.className = "text-center mt-4 text-success fw-bold";
                    swCount++;
                    if (swCount === 4) { swWin.classList.remove('d-none'); swStatus.innerText = "Selesai!"; }
                } else if(el) {
                    swStatus.innerText = "Salah penempatan kategori software, coba lagi.";
                    swStatus.className = "text-center mt-4 text-danger small";
                }
            });
        });

        // LOGIK MINI GAME LEVEL 3 (JARINGAN)
        const netZones = document.querySelectorAll('.net-zone');
        const netWin = document.querySelector('.net-win-message');
        let netCount = 0;

        netZones.forEach(target => {
            target.addEventListener('dragover', (e) => { e.preventDefault(); target.classList.add('hovered'); });
            target.addEventListener('dragleave', () => target.classList.remove('hovered'));
            target.addEventListener('drop', (e) => {
                e.preventDefault();
                target.classList.remove('hovered');
                const id = e.dataTransfer.getData('text/plain');
                const el = document.getElementById(id);

                if (el && id === target.getAttribute('data-target')) {
                    target.classList.add('correct');
                    target.innerHTML = `✅ <b>${id.toUpperCase()}</b>: ${target.innerText}`;
                    el.remove();
                    netCount++;
                    if (netCount === 3) { netWin.classList.remove('d-none'); }
                }
            });
        });
    </script>
</body>
</html>