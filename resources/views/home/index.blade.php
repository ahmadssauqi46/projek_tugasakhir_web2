@extends('layouts.app')
@section('content')
<section class="hero">
 <div class="container">
  <div class="row align-items-center g-4">
   <div class="col-lg-7">
    <span class="chip"><i class="bi bi-stars"></i> Media Pembelajaran Komputer Interaktif</span>
    <h1 class="display-5 fw-bold mt-3 mb-3">Belajar Hardware dan Software Komputer dengan Interaktif</h1>
    <p class="lead muted">Website pembelajaran untuk siswa SMA kelas 10–11 yang membantu memahami pengertian dasar komputer, perangkat keras, perangkat lunak, dan hubungan keduanya melalui materi bertahap, latihan, quiz, evaluasi, progress, poin, badge, dan leaderboard.</p>
    <div class="d-flex flex-wrap gap-2 mt-4"><a href="{{ route('materi.index') }}" class="btn btn-main">Mulai Belajar</a><a href="{{ route('dashboard.siswa') }}" class="btn btn-soft">Lihat Dashboard</a></div>
   </div>
   <div class="col-lg-5"><div class="card-soft illus-card computer-svg"><svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="23" y="25" width="74" height="48" rx="8" stroke="currentColor" stroke-width="6"/><path d="M48 91h24M60 73v18" stroke="currentColor" stroke-width="6" stroke-linecap="round"/><circle cx="92" cy="88" r="11" stroke="#06b6d4" stroke-width="5"/><path d="M92 69v8M92 99v8M73 88h8M103 88h8" stroke="#06b6d4" stroke-width="4" stroke-linecap="round"/></svg></div></div>
  </div>
  <div class="row g-3 mt-4">
   @foreach([['Materi Bertahap','Sub bab terkunci sampai latihan selesai','bi-journal-text'],['Latihan Interaktif','5 soal, hasil langsung tampil','bi-ui-checks'],['Quiz 1 Kali','10 soal, nilai tersimpan','bi-patch-question'],['Evaluasi Akhir','20 soal, nilai disimpan guru','bi-clipboard-check'],['Progress Belajar','Progress bar, poin, badge','bi-graph-up'],['Leaderboard','Ranking berdasarkan poin dan nilai','bi-trophy']] as $f)
   <div class="col-md-4"><div class="mini-card h-100"><div class="d-flex gap-3"><div class="icon-box"><i class="bi {{ $f[2] }}"></i></div><div><h6 class="fw-bold mb-1">{{ $f[0] }}</h6><p class="small muted mb-0">{{ $f[1] }}</p></div></div></div></div>
   @endforeach
  </div>
 </div>
</section>
@endsection
