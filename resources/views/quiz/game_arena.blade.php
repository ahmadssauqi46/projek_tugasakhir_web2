@extends('layouts.app')

@section('title', 'Simulasi Interaktif')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3"><i class="bi bi-controller"></i> Simulasi Interaktif</span>
            <h2 class="fw-bold mb-2">Simulasi Hardware dan Software</h2>
            <p class="muted mb-0">Latihan visual untuk memahami komponen komputer, software, alur data, penyimpanan, dan troubleshooting.</p>
        </div>

        <div class="card-soft p-4 p-md-5">
            <div class="simulation-tabs">
                <button class="simulation-tab active" type="button" data-sim-tab="hardware"><i class="bi bi-cpu me-1"></i> Hardware</button>
                <button class="simulation-tab" type="button" data-sim-tab="software"><i class="bi bi-window-stack me-1"></i> Software</button>
                <button class="simulation-tab" type="button" data-sim-tab="dataflow"><i class="bi bi-diagram-3 me-1"></i> Alur Data</button>
                <button class="simulation-tab" type="button" data-sim-tab="storage"><i class="bi bi-device-ssd me-1"></i> Storage</button>
                <button class="simulation-tab" type="button" data-sim-tab="trouble"><i class="bi bi-tools me-1"></i> Troubleshooting</button>
            </div>

            <div id="sim-hardware" class="simulation-content">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                    <div><h4 class="fw-bold text-primary mb-1">Susun Komponen Komputer</h4><p class="text-muted mb-0 small">Klik komponen, lalu klik posisi yang benar di casing.</p></div>
                    <span class="chip" id="hardwareScore">0/5 tepat</span>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Pilihan Komponen</h6>
                        <div class="d-flex flex-column gap-2 sim-palette" data-group="hardware">
                            <button class="simulation-item" type="button" data-id="cpu">Prosesor CPU</button>
                            <button class="simulation-item" type="button" data-id="ram">RAM Memory</button>
                            <button class="simulation-item" type="button" data-id="psu">Power Supply</button>
                            <button class="simulation-item" type="button" data-id="ssd">SSD Storage</button>
                            <button class="simulation-item" type="button" data-id="gpu">Kartu Grafis GPU</button>
                        </div>
                        <div class="alert alert-success mt-4 d-none" id="hardwareSuccess"><b>Bagus!</b> Semua komponen hardware sudah tepat.</div>
                    </div>
                    <div class="col-md-8">
                        <div class="computer-case">
                            <h6 class="text-center text-white-50 fw-bold mb-4">BAGIAN DALAM CASING KOMPUTER</h6>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label text-white-50 small">Socket Motherboard</label><button class="drop-zone hardware-zone" type="button" data-target="cpu">CPU di sini</button></div>
                                <div class="col-md-6"><label class="form-label text-white-50 small">Slot RAM</label><button class="drop-zone hardware-zone" type="button" data-target="ram">RAM di sini</button></div>
                                <div class="col-md-6"><label class="form-label text-white-50 small">Bay Storage</label><button class="drop-zone hardware-zone" type="button" data-target="ssd">SSD di sini</button></div>
                                <div class="col-md-6"><label class="form-label text-white-50 small">Slot PCIe</label><button class="drop-zone hardware-zone" type="button" data-target="gpu">GPU di sini</button></div>
                                <div class="col-md-12"><label class="form-label text-white-50 small">Dudukan Bawah</label><button class="drop-zone hardware-zone" type="button" data-target="psu">Power Supply di sini</button></div>
                            </div>
                            <div class="text-center mt-4 small" id="hardwareStatus">Pilih komponen terlebih dahulu.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sim-software" class="simulation-content d-none">
                <div class="mb-4"><h4 class="fw-bold text-primary mb-1">Klasifikasi Software</h4><p class="text-muted mb-0 small">Klik software, lalu klik kategori yang sesuai.</p></div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="fw-bold mb-3">Daftar Software</h6>
                        <div class="d-flex flex-column gap-2 sim-palette" data-group="software">
                            <button class="simulation-item" type="button" data-kind="os">Windows 11</button>
                            <button class="simulation-item" type="button" data-kind="os">Linux Ubuntu</button>
                            <button class="simulation-item" type="button" data-kind="app">Google Chrome</button>
                            <button class="simulation-item" type="button" data-kind="app">Microsoft Word</button>
                            <button class="simulation-item" type="button" data-kind="utility">Antivirus</button>
                            <button class="simulation-item" type="button" data-kind="driver">Printer Driver</button>
                        </div>
                        <div class="alert alert-success mt-4 d-none" id="softwareSuccess"><b>Hebat!</b> Semua software sudah dikelompokkan.</div>
                    </div>
                    <div class="col-md-8"><div class="row g-3">
                        <div class="col-md-6"><button class="software-box software-zone" type="button" data-accept="os"><h6>Sistem Operasi</h6></button></div>
                        <div class="col-md-6"><button class="software-box software-zone" type="button" data-accept="app"><h6>Aplikasi</h6></button></div>
                        <div class="col-md-6"><button class="software-box software-zone" type="button" data-accept="utility"><h6>Utility</h6></button></div>
                        <div class="col-md-6"><button class="software-box software-zone" type="button" data-accept="driver"><h6>Driver</h6></button></div>
                    </div><p class="text-center mt-4 text-muted small" id="softwareStatus">Pilih software lalu kategorinya.</p></div>
                </div>
            </div>

            <div id="sim-dataflow" class="simulation-content d-none">
                <h4 class="fw-bold text-primary mb-3">Urutkan Alur Kerja Komputer</h4>
                <p class="muted">Pilih tahap sesuai urutan kerja komputer.</p>
                <div class="row g-3" id="flowChoices">
                    @foreach(['Input','Process','Storage','Output'] as $item)
                        <div class="col-md-3"><button class="flow-choice w-100" type="button" data-flow="{{ $item }}">{{ $item }}</button></div>
                    @endforeach
                </div>
                <div class="flow-board mt-4" id="flowBoard">Urutan: <span id="flowText">-</span></div>
                <div class="alert mt-3 d-none" id="flowResult"></div>
            </div>

            <div id="sim-storage" class="simulation-content d-none">
                <h4 class="fw-bold text-primary mb-3">Pilih Media Penyimpanan</h4>
                <div class="row g-3">
                    @foreach([
                        ['Install OS agar cepat','SSD'], ['Backup foto kapasitas besar','HDD Eksternal'], ['Kirim file tugas kecil','Flashdisk'], ['Akses file dari banyak perangkat','Cloud Storage']
                    ] as $case)
                        <div class="col-md-6"><div class="mini-card h-100"><h6 class="fw-bold">{{ $case[0] }}</h6><select class="form-select storage-select" data-answer="{{ $case[1] }}"><option value="">Pilih storage</option><option>SSD</option><option>HDD Eksternal</option><option>Flashdisk</option><option>Cloud Storage</option></select></div></div>
                    @endforeach
                </div>
                <button class="btn btn-main mt-4" type="button" id="checkStorage">Cek Jawaban</button>
                <div class="alert mt-3 d-none" id="storageResult"></div>
            </div>

            <div id="sim-trouble" class="simulation-content d-none">
                <h4 class="fw-bold text-primary mb-3">Troubleshooting Cepat</h4>
                <div class="row g-3">
                    @foreach([
                        ['Printer tidak terbaca','Periksa driver dan koneksi printer'], ['Komputer lambat saat banyak aplikasi','Cek RAM dan tutup aplikasi berat'], ['Tidak ada suara','Periksa speaker dan pengaturan audio'], ['File hilang setelah flashdisk rusak','Gunakan backup atau cloud storage']
                    ] as $case)
                        <div class="col-md-6"><div class="mini-card h-100"><h6 class="fw-bold">{{ $case[0] }}</h6><button class="btn btn-soft btn-sm show-solution" type="button" data-solution="{{ $case[1] }}">Lihat Solusi</button><p class="small muted mt-3 mb-0 solution-text d-none"></p></div></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('materi.index') }}" class="btn btn-soft"><i class="bi bi-arrow-left me-1"></i> Kembali ke Materi</a>
            <a href="{{ route('quiz.index') }}" class="btn btn-main ms-2">Lanjut ke Kuis <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
    </div>
</section>

<style>
.simulation-tabs{display:flex;flex-wrap:wrap;gap:10px;padding-bottom:18px;margin-bottom:28px;border-bottom:1px solid #e5e7eb}.simulation-tab,.flow-choice{border:0;background:#eef2ff;color:#475569;padding:10px 18px;border-radius:14px;font-weight:800}.simulation-tab.active,.simulation-tab:hover,.flow-choice:hover{background:#2563eb;color:#fff}.simulation-item{background:#eef2ff;border:2px dashed #2563eb;border-radius:14px;padding:12px;text-align:center;font-weight:800;color:#1e3a8a}.simulation-item.selected{background:#2563eb;color:#fff;border-style:solid}.computer-case{background:linear-gradient(135deg,#0f172a,#1e293b);border-radius:22px;min-height:430px;padding:24px;color:#fff}.drop-zone{width:100%;border:2px dashed rgba(255,255,255,.4);border-radius:14px;height:95px;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.05);color:rgba(255,255,255,.75);text-align:center;padding:10px}.drop-zone.correct{background:rgba(22,163,74,.18);border-color:#22c55e;color:#86efac;border-style:solid;font-weight:800}.software-box{width:100%;background:linear-gradient(135deg,#0f172a,#1e293b);border-radius:18px;min-height:170px;padding:20px;color:#fff;border:2px dashed rgba(255,255,255,.2)}.software-box.correct{border-color:#22c55e}.software-item-added{background:rgba(255,255,255,.1);padding:9px;margin-top:10px;border-radius:10px;font-size:14px;text-align:center}.flow-board{background:#f8fafc;border:1px solid #dbe5f1;border-radius:18px;padding:18px;font-weight:800}@media(max-width:576px){.simulation-tab{width:100%}}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
 let selected=null, selectedGroup=null;
 document.querySelectorAll('[data-sim-tab]').forEach(btn=>btn.addEventListener('click',()=>{document.querySelectorAll('[data-sim-tab]').forEach(b=>b.classList.remove('active'));document.querySelectorAll('.simulation-content').forEach(c=>c.classList.add('d-none'));btn.classList.add('active');document.getElementById('sim-'+btn.dataset.simTab).classList.remove('d-none');selected=null;selectedGroup=null;}));
 document.querySelectorAll('.simulation-item').forEach(item=>item.addEventListener('click',()=>{document.querySelectorAll('.simulation-item').forEach(i=>i.classList.remove('selected'));item.classList.add('selected');selected=item;selectedGroup=item.closest('.sim-palette')?.dataset.group;}));
 let hardwareCorrect=0;document.querySelectorAll('.hardware-zone').forEach(zone=>zone.addEventListener('click',()=>{if(!selected||selectedGroup!=='hardware')return;let status=document.getElementById('hardwareStatus');if(selected.dataset.id===zone.dataset.target){zone.classList.add('correct');zone.textContent='Benar: '+selected.textContent;selected.remove();selected=null;hardwareCorrect++;document.getElementById('hardwareScore').textContent=hardwareCorrect+'/5 tepat';status.textContent='Komponen tepat.';if(hardwareCorrect===5)document.getElementById('hardwareSuccess').classList.remove('d-none');}else{status.textContent='Posisi belum tepat. Coba lagi.';}}));
 let softwareCorrect=0;document.querySelectorAll('.software-zone').forEach(zone=>zone.addEventListener('click',()=>{if(!selected||selectedGroup!=='software')return;let status=document.getElementById('softwareStatus');if(selected.dataset.kind===zone.dataset.accept){let added=document.createElement('div');added.className='software-item-added';added.textContent=selected.textContent;zone.appendChild(added);zone.classList.add('correct');selected.remove();selected=null;softwareCorrect++;status.textContent='Kategori tepat.';status.className='text-center mt-4 text-success fw-bold';if(softwareCorrect===6)document.getElementById('softwareSuccess').classList.remove('d-none');}else{status.textContent='Kategori belum tepat. Coba lagi.';status.className='text-center mt-4 text-danger small';}}));
 const order=['Input','Process','Storage','Output'];let flow=[];document.querySelectorAll('.flow-choice').forEach(btn=>btn.addEventListener('click',()=>{flow.push(btn.dataset.flow);btn.disabled=true;document.getElementById('flowText').textContent=flow.join(' > ');if(flow.length===4){let ok=flow.every((v,i)=>v===order[i]);let res=document.getElementById('flowResult');res.className='alert mt-3 '+(ok?'alert-success':'alert-warning');res.textContent=ok?'Urutan benar. Komputer menerima input, memproses, menyimpan, lalu menghasilkan output.':'Urutan belum tepat. Urutan yang benar: Input > Process > Storage > Output.';res.classList.remove('d-none');}}));
 document.getElementById('checkStorage')?.addEventListener('click',()=>{let total=0;document.querySelectorAll('.storage-select').forEach(s=>{if(s.value===s.dataset.answer)total++;});let res=document.getElementById('storageResult');res.className='alert mt-3 '+(total===4?'alert-success':'alert-warning');res.textContent='Jawaban benar: '+total+' dari 4.';res.classList.remove('d-none');});
 document.querySelectorAll('.show-solution').forEach(btn=>btn.addEventListener('click',()=>{let p=btn.parentElement.querySelector('.solution-text');p.textContent=btn.dataset.solution;p.classList.remove('d-none');}));
});
</script>
@endsection